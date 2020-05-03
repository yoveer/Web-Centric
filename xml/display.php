<html>

<head>
    <style>
        table,
        th,
        td {
            border: 2px solid blue;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 5px;
        }
    </style>
</head>

<body>

    <?php
    echo "<button type=\"button\" onclick=\"loadXMLDoc()\">Cart Products</button>";
    echo "<br><br>";
    echo "<div id=\"demo1\"></div>";
    echo "<table id=\"demo\"></table>";
    ?>


    <script>
        function loadXMLDoc() {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    myFunction(this);
                }
            };
            xmlhttp.open("GET", "test.xml", true);
            xmlhttp.send();
        }

        function myFunction(xml) {
            var i;
            var xmlDoc = xml.responseXML;
            //   var y = "tama";
            var y = xmlDoc.getElementsByTagName("User")[0].getAttribute("Name");
            y = "<h2>User: " + y + "</h2>";
            document.getElementById("demo1").innerHTML = y;
            var x = xmlDoc.getElementsByTagName("Product");
            var table = "<tr><th>Shoe Name</th><th>Price</th><th>Quantity</th><th>Photo</th></tr>";
            for (i = 0; i < x.length; i++) {
                table += "<tr><td>" +
                    x[i].getElementsByTagName("shoe_name")[0].childNodes[0].nodeValue +
                    "</td><td>" +
                    x[i].getElementsByTagName("price")[0].childNodes[0].nodeValue +
                    "</td><td>" +
                    x[i].getElementsByTagName("Quantity")[0].childNodes[0].nodeValue +
                    "</td><td>" + "<img width = \"100px\" height = \"100px\" class=\"card-img-top\" src=../" +
                    x[i].getElementsByTagName("shoe_photo")[0].childNodes[0].nodeValue +
                    " alt=\"Cart image\">" + "</td></tr>";
            }
            document.getElementById("demo").innerHTML = table;
        }
    </script>

</body>

</html>