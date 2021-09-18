<!DOCTYPE html>
<html>
  <head>
    <title>Address Form Simple Example 1</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <script src="https://api.longdo.com/map/?key=fortestonlydonotuseinproduction!"></script>
    <script src="https://api.longdo.com/address-form/js/addressform.js"></script>
    <script>
      var myform;

      function init() {
          //parameter 1 -> id ของ div ที่จะใส่ฟอร์ม
          //parameter 2 -> option ต่างๆ
          myform = new longdo.AddressForm('form_div',{
            showLabels: false,      // ซ่อนคำกำกับช่องใส่ข้อมูล
            debugDiv: 'debugoutput' // กำหนด div ที่ใช้แสดงข้อมูลจากฟอร์ม
          });
      }
    </script>
  </head>

  <body onload="init()">
    <div style="margin: auto;max-width: 700px;">
      <div style="font-size:1.2em; width: 380px; margin: 0 auto 1rem; display: inline-block;">

        <!-- div สำหรับโชว์แบบฟอร์ม -->
        <div id="form_div">Loading...</div>

        <button onclick="myform.getFormJSON()">Submit</button>
        <button onclick="myform.resetForm()">Reset</button>
      </div>

      <!-- div สำหรับแสดงข้อมูลฟอร์มหลังกด Submit -->
      <div id="debugoutput" style="max-width: 20rem;background-color: #fff39c;
      padding: 0.5rem; border-radius: 6px; display: inline-block;vertical-align: top;">
        ลองกรอกข้อมูลในฟอร์ม
      </div>
    </div>
  </body>
</html>