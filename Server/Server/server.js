var express = require('express'),
    router = express.Router(),
    app = express(),
    config = require('./config'),
    pi_plant = require('./end/pi_plant'),
    pi_camera = require('./end/pi_camera'),
    website = require('./end/website_control'),
    bodyParser = require('body-parser');

router.route('/').get(function (req, res, next) {
    res.writeHead(200, {'Content-Type': 'text/plain'});
    res.end('Welcome To RoseFit\nVersion - African Violet\n');
});

app.use( bodyParser.json() );       // to support JSON-encoded bodies
app.use(bodyParser.urlencoded({     // to support URL-encoded bodies
  extended: true
})); 
app.use('/', router);
app.use('/plant',pi_plant);
app.use('/pi_camera',pi_camera);
app.use('/website',website);

var server = app.listen(config.port, config.ip, function () {
	var host = server.address().address;
    var port = server.address().port;
	console.log('Server listening at http://%s:%s', host, port);
});