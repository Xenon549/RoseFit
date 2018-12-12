var express = require('express');
var router = express.Router();
var fs = require('fs-extra');
var multer = require('multer');

var upload = multer({
    storage: multer.diskStorage({
      destination: (req, file, callback) => {
        let path = '../images/';
        fs.mkdirsSync(path);
        callback(null, path);
      }}),
      filename: (req, file, callback) => {
        //originalname is the uploaded file's name with extn
        callback(null, file.originalname);
      }});

// File input field name is simply 'file'
router.post('/uploads', upload.single('profileImage'), function(req, res) {
//   var file = __dirname + '/' + req.file.filename;
var file = req.file.fieldname+'-'+Date.now()+'.jpg'
  fs.rename(req.file.path, file, function(err) {
    if (err) {
      console.log(err);
      res.send(500);
    } else {
      res.json({
        message: 'File uploaded successfully',
        filename: req.file.filename
      });
    }
  });
});
module.exports = router;