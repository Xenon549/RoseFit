var express = require('express'),
    router = express.Router(),
    SQL = require('../SQL/SQL');


//取得系統時間
function getDateStringCustom(oDate) {
  var sDate;
  if (oDate instanceof Date) {
      sDate = oDate.getYear() + 1900
          + '-'
          + ((oDate.getMonth() + 1 < 10) ? '0' + (oDate.getMonth() + 1) : oDate.getMonth() + 1)
          + '-' + oDate.getDate()
          + ' ' + oDate.getHours()
          + ':' + ((oDate.getMinutes() < 10) ? '0' + (oDate.getMinutes()) : oDate.getMinutes())
          + ':' + ((oDate.getSeconds() < 10) ? '0' + (oDate.getSeconds()) : oDate.getSeconds());
  } else {
      throw new Error("oDate is not an instance of Date");
  }
  return sDate;
}

//取得溫室ID
function getGreenHouseID(key, callback) {
  SQL.connection.query("SELECT gh_id from greenhouse_user1 where greenhouse_key = '"+key+"'", function (error, results, fields) {
    if(error){
      callback(-1);
    } else {
      if(results.length > 0){
        callback(results[0].gh_id);
      }else {
        callback(-1);
      }
    }
  });
}

router.route('/control').post(function(req, res, next){
  var key = req.body.greenhouse_key;
  SQL.connection.query("SELECT * from user_control where greenhouse_key = '"+key+"'", function(error, results, fields){
    if(error){
      res.send(JSON.stringify({"status": 500, "error": error, "response": null}));
    } else {
      if(results.length > 0){
        res.send(JSON.stringify({"status": 200, "response": results}));
      }else {
        res.send(JSON.stringify({"status": 500, "error": "No Data ", "response": null}));
      }
    }
    })
});


//初始化溫室
router.route('/initialize').post(function (req, res, next) {    
    var getUserID = function(key){
      SQL.connection.query("SELECT user_id from greenhouse_user1 where greenhouse_key = '"+key+"'", function (error, results, fields) {
          if(error){
            getProjectID(-1,key);
          } else {
            if(results.length > 0){
              getProjectID(results[0].user_id,key);
            }else {
              getProjectID(-1,key);
            }
          }
      });
    }
    var getProjectID = function(ID, key){
      SQL.connection.query("SELECT project_id FROM project WHERE greenhouse_key = '"+key+"'"+" AND user_id = '"+ID+"'", function (error, results, fields) {
          if(error){
              getPlan(-1);
          } else {
            if(results.length > 0){
              getPlan(results[0].project_id);
            }else {
              getPlan(-1);
            }
          }
      });
    }
    var getPlan = function(plan_id){
      SQL.connection.query("SELECT * FROM plan_data WHERE project_id = '"+plan_id+"'", function (error, results, fields) {
          if(error){
              res.send(JSON.stringify({"status": 500, "error": error, "response": null}));
          } else {
            if(results.length > 0){
              res.send(JSON.stringify({"status": 200, "response": results}));
            }else {
              res.send(JSON.stringify({"status": 500, "error": "No Data ", "response": null}));
            }
          }
      });
    }
    getUserID(req.body.greenhouse_key);
});

//更新溫室資料
router.route('/update').post(function (req, res, next) {
    var air_temperature = req.body.air_temperature;
    var air_humidity = req.body.air_humidity;
    var soil_humidity = req.body.soil_humidity;
    var motor_status = req.body.motor_status;
    var light_status = req.body.light_status;
    var fan_status = req.body.fan_status;
    var heating_light = req.body.heating_light;
    var spraying_status = req.body.spraying_status;
    var ambient_light = req.body.ambient_light;
    var current_time = getDateStringCustom(new Date());
    var insertData = function(greenhouse_id){
      if(greenhouse_id != -1){
          SQL.connection.query("INSERT INTO `greenhouse_data` (`air_temperature`,`air_humidity`,`soil_humidity`, `motor_status`, `light_status`, `data_time`, `gh_id`, `greenhouse_id`"+
          ", `fan_status`, `heating_light`, `spraying_status`, `ambient_light`"+") VALUES ("
          +air_temperature+","+air_humidity+","+soil_humidity+","+motor_status+","+light_status+",'"+current_time+"',"+greenhouse_id+",1,"+fan_status+","+heating_light+","+spraying_status+","+ambient_light+")", function(error, results){
            if(error){
              res.send(JSON.stringify({"status": 500, "error": "Database Error", "response": error.sqlMessage}));
            } else {
              res.send(JSON.stringify({"status": 200, "error": null}));
            }
          });
      }else {
        res.send(JSON.stringify({"status": 500, "error": "Please Confirm The Greenhouse Has Been Registered", "response": null})); 
      }
    };
    getGreenHouseID(req.body.greenhouse_key, insertData);
});

module.exports = router;