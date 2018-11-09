<?php //this is what connects me to the database_handler.php file which will give me access to variable connection and that variable will help me connect to the database
  include_once 'additional_files/database_handler.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"
    <title></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



    <script type="text/javascript">

      function addCategory() {
           return "<div class='col-3'>" +
                  " " + "<input class='cat-text' type='text' name='answer[]' placeholder='Category' >" +
                  "</div>" +
                  "<div class='col-9'>" +
                  "<input  class='item-text' type='text' name='answer[]' placeholder='Enter your insight/step/answer here...'>" +
                  "</div>" +
                  "<div class='w-100'></div>";
      }

      function addItem() {
        return  "<input class='item-text' type='text' name='answer[]' placeholder='Enter another insight/step/answer here...'>" +
                "<div class='w-100'></div>"
      }

      function addCategoryButton() {
          return "<div class='col-3'>" +
                 "<button class='add-button-category'> Add </button>" +
                 "</div>"
      }

      function addItemButton() {
        return "<div class='col-9'>" +
                "<button class='add-button-item'> Add </button>" +
                "</div>"
      }

        $(document).ready(function() {
          $(document).on("click",".add-button-item",function() {
             let item = addItem()
              $(this).before(item)
          });

          $(document).on("click",".add-button-category",function() {
            $(this).remove()
            let category = addCategory()
            let buttonCat = addCategoryButton()
            let buttonItem = addItemButton()
             $(".input").append(category, buttonCat, buttonItem);
          });

          $(document).on("click","#submit",function() {

// debugger

            //  items = $('input[name="answer[]"]').serializeArray()
            //  category = $('input[name="category[]"]').serializeArray()

            //maybe iterate through the category?



            // data = $('input').serializeArray()



              //  process the form ad make a json object with catogories and items
              //  send it as json
              //  in php: parse json and turn it to array
              //
              data = $('input[name="answer[]"]').serializeArray()



              // debugger
              // data = {
              //   answer: $('input[name="answer[]"]').serializeArray()
              // }
              // data = {
              //     answer: $('input[name="answer[]"]').serializeArray()
              // }


            $.ajax({
              url: "insert.php",
              type: "POST",
              data: data,
              success: function(data) {

                $(".card-block").addClass("display-response")
                $(".display-response").html(data)
                $(".input").remove()
                $(".submit").remove()

              }
            })
          })


        })

    </script>

  </head>
  <body>


    <?php
      $sql = "SELECT * FROM brainstorm_problems WHERE status='active';";
      $result = mysqli_query($connect, $sql); //this is where we are communicating with the database askin to return everything from the brainstorm_problems table
      $resultCheck = mysqli_num_rows($result); // check to make sure you have some results from the SQL statement, else you will get an error on your browser

      if ($resultCheck > 0) {
        //the code below will fetch all the data in an array from the database..$row will give you an array of all the data you fetched.
        //fetch_assoc basically is a function that fetches data associated to each other and store it in an array
        while ($row = mysqli_fetch_assoc($result)) {
              echo "<div class='problem_page'>" .
              "<h2>" . $row['title'] . "<br>" . "</h2>" .
              "<p class='category'>" . "Category: " . $row['category'] . "<br>" . "</p>" .
              "<p class='prob'>" . $row['prob'] . "</p>" .
              "</div>";
        }
      }


    ?>






          <div class="card">
            <div class="card-header">Enter answers</div>
            <div class="card-block" >


             <div class="row input">

                    <div class="col-3 title">Category(s)</div>
                    <div class="col-9 title">Item(s)</div>
                    <div class="w-100"></div>


                    <div class="col-3">

                      <input class="cat-text" type="text" name="answer[]" placeholder="Category" >
                    </div>
                    <div class="col-9">
                      <input class="item-text" type="text" name="answer[]" placeholder="Enter your insight/step/answer here...">
                    </div>
                    <div class="w-100"></div>



                    <div class="col-3"><button class="add-button-category "> Add </button></div>

                    <div class="col-9"><button class="add-button-item"> Add </button></div>




            </div>
                    <div><button type="submit" name="submit" class="submit-button" id="submit"> Submit </button></div>
         </div>

      </div>


  </body>
</html>
