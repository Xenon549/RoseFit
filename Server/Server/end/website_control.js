var express = require('express'),
    router = express.Router(),
    SQL = require('../SQL/SQL');

router.route('/control').post(function (req, res, next) {
    var key = req.body.greenhouse_key;
    var air_temperature_upper = req.body.air_temperature_upper;
    var air_temperature_lower = req.body.air_temperature_lower;
    var air_humidity_lower = req.body.air_humidity_lower;
    var air_humidity_upper = req.body.air_humidity_upper;
    var soil_humidity_upper = req.body.soil_humidity_upper;
    var soil_humidity_lower = req.body.soil_humidity_lower;
    var light_status = req.body.light_status; 

    SQL.connection.query("REPLACE INTO `user_control` (`greenhouse_key`, `air_temperature_upper`, `air_temperature_lower`,"+
    " `air_humidity_upper`, `air_humidity_lower`, `soil_humidity_upper`, `soil_humidity_lower`, `light_status`)"
    +"VALUES('"+key+"', "+air_temperature_upper+", "+air_temperature_lower+", "+air_humidity_upper+", "+air_humidity_lower
    +", "+soil_humidity_upper+", "+soil_humidity_lower+", "+light_status+")",function(error, results){
        if(error){
            res.send(JSON.stringify({"status": 500, "error": error, "response": null}));
        } else {
            res.send(JSON.stringify({"status": 200}));
        }
    });
});
module.exports = router;