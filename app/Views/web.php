<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- W3.CSS -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />

    <!-- Google Font -->
    <link
      href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;500;700&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="css/style.css" />

    <title>Thailand Address</title>
  </head>
  <body>
    <div class="w3-container w3-margin-top">
      <!-- Start Search Content -->
      <div class="w3-content">
        <div class="w3-row w3-margin">
          <h3><i class="fa fa-home"></i> Thailand Search Address</h3>
          <div class="autocomplete">
            <input
              id="search"
              type="text"
              name="address"
              class="w3-input w3-border w3-xlarge"
              placeholder="Enter address..."
            />
            <div id="matchList">
              <!-- Create math list by JS functions -->
              <!-- <ul class="w3-ul w3-hoverable w3-border">
                <li>address 1</li>
                <li>address 2</li>
                <li>address 3</li>
              </ul> -->
            </div>
          </div>
        </div>
      </div>
      <!-- End Search Content -->

      <!-- Start Address Input Content-->
      <div class="w3-content">
        <div class="w3-row-padding w3-padding-16">
          <div class="w3-half">
            <label>ตำบล / แขวง</label>
            <input
              id="district"
              type="text"
              name="district"
              class="w3-input w3-border w3-xlarge"
              placeholder="ตำบล / แขวง"
            />
          </div>
          <div class="w3-half">
            <label>อำเภอ / เขต</label>
            <input
              id="amphoe"
              type="text"
              name="amphoe"
              class="w3-input w3-border w3-xlarge"
              placeholder="อำเภอ / เขต"
            />
          </div>
        </div>
        <div class="w3-row-padding w3-padding-16">
          <div class="w3-half">
            <label>จังหวัด</label>
            <input
              id="province"
              type="text"
              name="province"
              class="w3-input w3-border w3-xlarge"
              placeholder="จังหวัด"
            />
          </div>
          <div class="w3-half">
            <label>รหัสไปรษณีย์</label>
            <input
              id="zipcode"
              type="text"
              name="zipcode"
              class="w3-input w3-border w3-xlarge"
              placeholder="รหัสไปรษณีย์"
            />
          </div>
        </div>
      </div>
      <!-- End Address Input Content-->
    </div>

    <script src="js/main.js"></script>
  </body>
</html>