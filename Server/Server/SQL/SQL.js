var express = require('express'),
    // router = express.Router(),
    config = require('../config'),
    mysql = require('mysql');
//Database connection
var connection = mysql.createConnection({
        host     : config.db_host,
		user     : config.db_user,
		password : config.db_password,
		database : config.db_name,
  });

function handleDisconnect(){
    connection.connect(function(err) {
        if (err) {
            console.log('database connecting error');
            return;
        }
        console.log('database connecting success');
    });
    
    connection.on('error', function(err) {
        console.log('db error', err);
        if(err.code === 'PROTOCOL_CONNECTION_LOST') { // Connection to the MySQL server is usually
          handleDisconnect();                         // lost due to either server restart, or a
        } else {                                      // connnection idle timeout (the wait_timeout
          throw err;                                  // server variable configures this)
        }
    });
    
}

handleDisconnect();

module.exports = {
    // router,
    connection
};