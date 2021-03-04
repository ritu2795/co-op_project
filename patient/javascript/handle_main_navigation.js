$(document).ready(function () {
    $.ajax({
        type: "POST",
        url: "/workplace/patient/serverside/respond_main_navigation.php",
        dataType: "text",
        error: function (request, error) {
            console.log(arguments);
            alert(" Can't do because: " + error);
        },
        success: function (JSONObject) {
            var peopleHTML = "";
            var tempjsonval = JSON.parse(JSONObject);
            console.log(tempjsonval);
            var str = "";
            var count = tempjsonval[0].length;
            if (tempjsonval[1].name == null) {
                window.location.href="/";
            }
            else {
                str += "<nav class=\"navbar navbar-expand-lg navbar-light bg-info fixed-top\">\n" +
                    "            <button class=\"navbar-toggler bg-light\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">\n" +
                    "              <span class=\"navbar-toggler-icon text-white\"></span>\n" +
                    "            </button>\n" +
                    "            <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">\n" +
                    "              <ul class=\"navbar-nav mr-auto\">\n" +
                    "                <li class=\"nav-item active\">\n" +
                    "                  <a class=\"nav-link text-white\" href=\"/workplace/patient/home.html\">Home </a>\n" +
                    "                </li>\n" +
                    "                <li class=\"nav-item dropdown\">\n";

                //for navigation disable
                if (true) {
                    str += "                  <a class=\"nav-link dropdown-toggle text-white\" href=\"#\" id=\"navbarDropdown1\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n" +
                        "                    Demo\n" +
                        "                  </a>\n" +

                        "                  <div class=\"dropdown-menu bg-info\" aria-labelledby=\"navbarDropdown1\">\n" +
                        "                    <a class=\"dropdown-item text-white\" href=\"/workplace/patient/culture_and_identity.html\">Demo</a>\n" +
                        "                    <div class=\"dropdown-divider\"></div>\n";
                }
                else {
                    str += "                  <a class=\"nav-link dropdown-toggle disabled text-secondary\" href=\"#\" id=\"navbarDropdown1\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n" +
                        "                    Demo\n" +
                        "                  </a>\n" +
                        "                  <div class=\"dropdown-menu bg-info\" aria-labelledby=\"navbarDropdown1\">\n" +
                        "                    <a class=\"dropdown-item diaabled text-secondary\" href=\"//workplace/patient/culture_and_identity.html\">Demo</a>\n" +
                        "                    <div class=\"dropdown-divider\"></div>\n"; 
                }

                if (true) {
                    str += "                    <a class=\"dropdown-item text-white\" href=\"/workplace/patient/story_of_metis_people.html\">Test</a>\n";
                  
                }
                else {
                    str += "                    <a class=\"dropdown-item disabled text-secondary\" href=\"#\">Test</a>\n";
                   
                    
                }
                str+=  "                  </div>\n" +
                "                </li>\n";

                 /* if (tempjsonval[0][0].check_complete ==1 && tempjsonval[5][0].flag_inserted_once ==1) {
                    str += "                    <a class=\"dropdown-item text-white\" href=\"/workplace/patient/storytelling.html\">Test 1</a>\n" +
                        "                  </div>\n" +
                        "                </li>\n";
                }
                else {
                    str += "                    <a class=\"dropdown-item disabled text-secondary\" href=\"#\">Test 1</a>\n" +
                        "                  </div>\n" +
                        "                </li>\n"; +
                        "              </ul>\n";
                }  */


                str+="           <ul class=\"navbar-nav my-2 my-lg-0\" >\n" +
                "<li class=\"nav-item dropdown \">\n" +
                "                  <a class=\"nav-link dropdown-toggle text-white \" href=\"#\" id=\"navbarDropdown2\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n" +
                tempjsonval[2][0].firstname+
                "                  </a>\n" +
                "                  <div class=\"dropdown-menu bg-info\" aria-labelledby=\"navbarDropdown2\">\n" +
                "                    <a class=\"dropdown-item text-white\" href=\"/workplace/patient/index.html\">Logout</a>\n" +
                "                    </div>\n" +
                "                    </li>\n" +
                "              </ul>\n" +
                "              \n" +
                "            </div>\n" +
                "          </nav>";

                document.getElementById("addnavigation").innerHTML = str;
            } 

        }
    });
});