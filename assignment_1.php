<html>
<head>
 <title>Assignment 1</title>

    <style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width:50%;
    }
    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }
    td {
        color:#B61919;
        font-weight:normal;
    }
    </style>
</head>
<body>

      <table>
          <tr>
              <th>Name</th>
              <th>Age</th>
              <th>School</th>
          </tr>
     
      <?php
      $json=file_get_contents("data.json"); // we are using "file_get_contents" function to read the json data file.
      $data = json_decode($json, true); // decoding a JSON string into an PHP object.

      foreach($data as $i) // we call the foreach loop to list all the data below from first to the last.
                           // also they will be shown as table, just as simple as that.
      {
            echo '<tr>';
            echo '<td>'.$i['name'].'</td>';
            echo '<td>'.$i['age'].'</td>';
            echo '<td>'.$i['school'].'</td>';
            echo '</tr>';
      }
      ?>

      </table>

</body>
</html>