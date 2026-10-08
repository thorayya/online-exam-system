
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="html1.css">
    <title>آزمون html و css</title>
</head>
<body>
    <!--sidebar count right-->
    <!--sidebar timer left-->
    <div class="container-html">
        <form id="myForm">
            <div class="questionh">
                <p><span>1-</span> کدام یک از خواص زیر در یک جدول ادغام سطری را تعریف می نماید؟</p></div>
                <div class="question">
                    <ul><div class="question1">
                    <li><label>الف) <input type="radio" name="questions1" value="colspan">colspan
                    <span class="check"></span></label></li></div><div class="question1">
                    <li><label>ب) <input type="radio" name="questions1" value="rowspan">rowspan<span class="check"></span></label></li></div><div class="question1">
                    <li><label>ج) <input type="radio" name="questions1" value="cell spacing" >cell spacing<span class="check"></span></label></li></div><div class="question1 question2">
                    <li><label>د) <input type="radio" name="questions1" value="a , b">الف و ب<span class="check"></span></label></li></div>
                    </div>
                    </ul></div></label>
            </div>
        </form>
    </div>
        <script src="jquery-3.7.1.min.js"></script>
    <script>
        // function handle(){
        //     let questions = document.querySelectorAll('input[name="questions1"]');
        //     var a;
        //     var x;
        //     for(let question of questions)
        //     {
        //         if(question.checked)
        //         {
        //             a = question.value;
        //             x = new XMLHttpRequest();
        //             x.onreadystatechange = function(){
        //                 if(this.readyState ==4 && this.status == 200)
        //                 {
        //                     console.log("ok");
        //                 }
        //             }

        //             x.open('GET','ajax.php?=anwser'+x,true);
        //             x.send();
        //         }
        //     }
        // }

        $('#myForm input').on('change', function()
        {
           var a  = $('input[name=questions1]:checked','#myForm').val();
           var id = "3";
           $.ajax({
            url: 'ajax.php',
            method: 'POST',
            data: {id: id, data: a},
            success: function(data,status){
                console.log(data);
            }
           })
        })   

    </script>
</body>
</html>