<?php include VIEW.'includes/header.php' ?>
<?php include VIEW.'includes/sidebar.php' ?>



<?php
 
$controller = $_SESSION['controller'];

 $email = $_SESSION['email'];
// $username = strtok($email, '@');
//$username = "jihaninanayakkara"; // the email must be valid. if note the calendar will not be visibled.
require 'connection.php';   // database connection file calling
// $userid=$_SESSION['userid'];

// $sql="SELECT title FROM events WHERE userid=$userid ";
// $res=$con->query($sql);
// $rgn=$res->fetch_all(MYSQLI_ASSOC); 

// foreach ($rgn as $key ) {
//     $_SESSION['title']=$key['title'];
// } 
// var_dump($_SESSION['title']);

switch($controller){

   case "divisional": 
?>


<div class="divisionDashboard">
   <div class="grid_box">
      <div class="box-1">
      <div class="nav_link"><B>INCOME METHOD</B></div>

         <canvas id="Chart1"></canvas>
      </div>
      <div class="box-2">
      <div class="nav_link"><B>AGE GROUP</B></div>
         <canvas id="Chart2"></canvas>
      </div>
      <div class="box-3" id="box_3">
      <!-- <h1><B><?php echo $_SESSION['username']?></B></h1>
      <h1><B><?php echo $_SESSION['userrole']?></B></h1>
      <h1><B><?php echo $_SESSION['regionName']?></B></h1> -->
         <div id="calendardate">
            <p id="calendar_day"></p>
            <p id="calendar_date"></p>
            <p id="calendar_month"></p>
            <p id="calendar_year"></p>
         </div>
         <div id="calendar_events" style="height: 290px;">
            <h3>Your Events</h3>
            <!-- <?php echo $_SESSION['userrole']; ?> -->
            <?php

               $userid=$_SESSION['userid'];

               $sql="SELECT title,start_event FROM events WHERE events.userid=$userid ";
               $res=$con->query($sql);
               $rgn=$res->fetch_all(MYSQLI_ASSOC); 
               $event="You Have No Event";
               if($rgn==NULL){
                  print ' <h3> ' . $event . ' </h3>';
               }
               else{
                  foreach ($rgn as $key ) {
                     $_SESSION['title']=$key['title'];
                     $_SESSION['start_event']=$key['start_event'];
                     print ' <h5> ' . $key['start_event'] . ' </h5>';
                     print ' <h5> ' . $key['title'] . ' </h5>';
                     // print" <h3 style='color: black;'>'.$_SESSION['title'].'</h3>";
                  } 
                 

               }                       
            ?>
         </div>
      </div>
      <div class="box-4">
         <div>
            <canvas id="Chart3"></canvas>
            
         </div>
      </div>
   </div>
</div>


<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<!-- ChartJS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>
   $( document ).ready(function() {
      $('#box_3').click(function(){
         window.location.href='/fadts/calender/ViewCalender';
      })
   });


   $(function () {
      var ctx = document.getElementById('Chart1').getContext('2d');
      var chart = new Chart(ctx, {
         type: 'pie',
         data: {
            labels: ['Goverment', 'Private', 'Retired','unemployee','SelfEmployee'],
            datasets: [{
                  label: '# fund release',
                  data: [100,200,50,30,20],
                  backgroundColor: [
                     '#16a085',
                     ' #668cff',
                     '#004080',
                     '#b30000',
                     '#f1c40f'
                  ],
                  borderWidth: 1
            }]
         },
         options: {
            rotation:Math.PI*0.5,
            animation:{
               animatescale:true
            },
            
         }
      }); 
      chart.canvas.parentNode.style.height = '100%';

  });


   $(function () {
      var ctx = document.getElementById('Chart2').getContext('2d');
      var chart = new Chart(ctx, {
         type: 'doughnut',
         data: {
            labels: ['0-18 years', '18-24 years', '25-64 years' ,'65 years and above'],
            datasets: [{
                  label: '# fund release',
                  data: [20,30,25,40],
                  backgroundColor: [
                     '#16a085',
                     '#f1c40f',
                     '#2980b9',
                     '#004080'
                  ],
                  borderColor: [
                     '#16a085',
                     '#f1c40f',
                     '#2980b9',
                     '#004080'
                  ],
                  borderWidth: 1
            }]
         },
         options: {
            rotation:Math.PI*-10.5,
            animation:{
               animatescale:true
            },
            
         }
      }); 
      chart.canvas.parentNode.style.height = '100%';

  });


  



  $(function () {
      // ChartJS
      var ctx = document.getElementById('Chart3').getContext('2d');
      console.log(Chart.defaults.scale.ticks);
      Chart.defaults.scale.ticks.beginAtZero=true;
      var chart = new Chart(ctx, {
         type: 'bar', // The type of chart we want to create
         data: {
            labels: ['January','February','March','April','May','June','July','August','September','Octomber','November','December'],
            datasets: [{
                  label: 'Fund Distribution',
                  data: [100,200,400,300,250,140,370,200,300,200],
                  backgroundColor:'#4cd84c',
                  hoverBackgroundColor:'#00FF00',
                  // borderColor:'#00FF00',
                  borderWidth: 2
            }]
         },
         options: {
            scales: {
                  yAxes: [{
                     ticks: {
                        beginAtZero: true
                     }
                  }]
            },
            maintainAspectRatio: false

         }
      }); 
      chart.canvas.parentNode.style.height = '100%';

  });


  


function calendar(){
   var day=['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
   var month=['January','February','March','April','May','June','July','August','September','October','November','December'];
   var d=new Date();
   console.log(day[d.getDay()]);
   $('#calendar_day').text(day[d.getDay()]);
   // setText('calendar_day', day[d.getDay()]);
   setText('calendar_date', d.getDate());
   setText('calendar_month', month[d.getMonth()]);
   setText('calendar_year', (1900+d.getYear()));
   
};

//this function will set the text value of tags
function setText(id, val){
    if(val < 10){
        val = '0' + val;    //add leading 0 if val < 10
    }
    document.getElementById(id).innerHTML = val;
};

//call calendar() when page load
window.onload = calendar;


</script>

<?php

   break;

   case "village":  // divisional secretary's sidebar elements 
   
?>
<div class="divisionDashboard">
   <div class="grid_box">
      <div class="box-1">
      <div class="nav_link"><B>GROSS INCOME</B></div>

         <canvas id="Chart1"></canvas>
      </div>
      <div class="box-2">
         <div class="nav_link"><B>Predefined Fund</B></div>
      <!-- <div class="nav_link"><B>FUND DELIVERY ANALYSIS</B></div> -->
         <canvas id="Chart2"></canvas>
      </div>
      <div class="box-3" id="box_3">
      <!-- <h1><B><?php echo $_SESSION['username']?></B></h1>
      <h1><B><?php echo $_SESSION['userrole']?></B></h1>
      <h1><B><?php echo $_SESSION['regionName']?></B></h1> -->
         <div id="calendardate">
            <p id="calendar_day"></p>
            <p id="calendar_date"></p>
            <p id="calendar_month"></p>
            <p id="calendar_year"></p>
         </div>
         <div id="calendar_events" style="height:290px ;">
         <h3>Your Events</h3>
            <!-- <?php echo $_SESSION['userrole']; ?> -->
            <?php

               $userid=$_SESSION['userid'];

               $sql="SELECT title,start_event FROM events WHERE events.userid=$userid ";
               $res=$con->query($sql);
               $rgn=$res->fetch_all(MYSQLI_ASSOC); 
               $event="You Have No Event";
               if($rgn==NULL){
                  print ' <h3> ' . $event . ' </h3>';
               }
               else{
                  foreach ($rgn as $key ) {
                     $_SESSION['title']=$key['title'];
                     $_SESSION['start_event']=$key['start_event'];
                     print ' <h5> ' . $key['start_event'] . ' </h5>';
                     print ' <h5> ' . $key['title'] . ' </h5>';
                     // print" <h3 style='color: black;'>'.$_SESSION['title'].'</h3>";
                  } 
                 

               }                       
            ?>
         </div>
      </div>
      <div class="box-4">
         <div>
            <canvas id="Chart3"></canvas>
         </div>
      </div>
   </div>
</div>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<!-- ChartJS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>
   $( document ).ready(function() {
      $('#box_3').click(function(){
         window.location.href='/fadts/calender/ViewCalender';
      })
   });


   $(function () {
      var ctx = document.getElementById('Chart1').getContext('2d');
      var chart = new Chart(ctx, {
         type: 'doughnut',
         data: {
            labels: ['Law Income', 'Middle Income','High Income',],
            datasets: [{
                  label: '# fund release',
                  data: [20,5,25],
                  backgroundColor: [
                     '#16a085',
                     '#f1c40f',
                     '#2980b9'
                  ],
                  borderColor: [
                     '#16a085',
                     '#f1c40f',
                     '#2980b9'
                  ],
                  borderWidth: 1
            }]
         },
         options: {
            rotation:Math.PI*-10.5,
            animation:{
               animatescale:true
            },
            
         }
      }); 
      chart.canvas.parentNode.style.height = '100%';

  });

  $(function () {
      var ctx = document.getElementById('Chart2').getContext('2d');
      var chart = new Chart(ctx, {
         type: 'doughnut',
         data: {
            labels: ['Samuddi', 'Mahapola','Adult Fund','Not receiving Any Fund'],
            datasets: [{
                  label: '# fund release',
                  data: [20,5,25,10],
                  backgroundColor: [
                     '#16a085',
                     'red',
                     '#2980b9',
                     '#00FF00'
                  ],
                  borderColor: [
                     '#16a085',
                     'red',
                     '#2980b9',
                     '#00FF00'
                  ],
                  borderWidth: 1
            }]
         },
         options: {
            rotation:Math.PI*-10.5,
            animation:{
               animatescale:true
            },
            
         }
      }); 
      chart.canvas.parentNode.style.height = '100%';

  });


  
  $(function () {
      // ChartJS
      var ctx = document.getElementById('Chart3').getContext('2d');
      console.log(Chart.defaults.scale.ticks);
      Chart.defaults.scale.ticks.beginAtZero=true;
      var chart = new Chart(ctx, {
         type: 'line', // The type of chart we want to create
         data: {
            labels: ['January','February','March','April','May','June','July','August','September','Octomber','November','December'],
            datasets: [{
                  label: 'Fund distribution Progress',
                  data: [100,200,400,300,250,140,370,200,300,200],
                  // backgroundColor:'#4cd84c',
                  hoverBackgroundColor:'#00FF00',
                  borderColor:'#00FF00',
                  borderWidth: 2
            }]
         },
         options: {
            scales: {
                  yAxes: [{
                     ticks: {
                        beginAtZero: true
                     }
                  }]
            },
            maintainAspectRatio: false

         }
      }); 
      chart.canvas.parentNode.style.height = '100%';

  });


  


function calendar(){
   var day=['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
   var month=['January','February','March','April','May','June','July','August','September','October','November','December'];
   var d=new Date();
   console.log(day[d.getDay()]);
   $('#calendar_day').text(day[d.getDay()]);
   // setText('calendar_day', day[d.getDay()]);
   setText('calendar_date', d.getDate());
   setText('calendar_month', month[d.getMonth()]);
   setText('calendar_year', (1900+d.getYear()));
};

//this function will set the text value of tags
function setText(id, val){
    if(val < 10){
        val = '0' + val;    //add leading 0 if val < 10
    }
    document.getElementById(id).innerHTML = val;
};

//call calendar() when page load
window.onload = calendar;


</script>






<?php

   break;

   case "audit":  // divisional secretary's sidebar elements 
   
?>


<div class="divisionDashboard">
   <div class="grid_box">
      <div class="box-1">
      <div class="nav_link"><B>CHANGES MADE</B></div>

         <canvas id="Chart1"></canvas>
      </div>
      <div class="box-2">
      <!-- <div class="nav_link"><B>FUND DELIVERY ANALYSIS</B></div> -->
         <canvas id="Chart2"></canvas>
      </div>
      <div class="box-3" id="box_3">
      <!-- <h1><B><?php echo $_SESSION['username']?></B></h1>
      <h1><B><?php echo $_SESSION['userrole']?></B></h1>
      <h1><B><?php echo $_SESSION['regionName']?></B></h1> -->
         <div id="calendardate">
            <p id="calendar_day"></p>
            <p id="calendar_date"></p>
            <p id="calendar_month"></p>
            <p id="calendar_year"></p>
         </div>
         <div id="calendar_events" style="height:100%;">
         <h3>Your Events</h3>
            <!-- <?php echo $_SESSION['userrole']; ?> -->
            <?php

               $userid=$_SESSION['userid'];

               $sql="SELECT title,start_event FROM events WHERE events.userid=$userid ";
               $res=$con->query($sql);
               $rgn=$res->fetch_all(MYSQLI_ASSOC); 
               $event="You Have No Event";
               if($rgn==NULL){
                  print ' <h3> ' . $event . ' </h3>';
               }
               else{
                  foreach ($rgn as $key ) {
                     $_SESSION['title']=$key['title'];
                     $_SESSION['start_event']=$key['start_event'];
                     print ' <h5> ' . $key['start_event'] . ' </h5>';
                     print ' <h5> ' . $key['title'] . ' </h5>';
                     // print" <h3 style='color: black;'>'.$_SESSION['title'].'</h3>";
                  } 
                 

               }                       
            ?>
         </div>
      </div>
      <div class="box-4">
         <div>
            <canvas id="Chart3"></canvas>
         </div>
      </div>
   </div>
</div>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<!-- ChartJS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>
   $( document ).ready(function() {
      $('#box_3').click(function(){
         window.location.href='/fadts/calender/ViewCalender';
      })
   });


   $(function () {
      var ctx = document.getElementById('Chart1').getContext('2d');
      var chart = new Chart(ctx, {
         type: 'doughnut',
         data: {
            labels: ['Village Officer', 'Division Secretary','Ministry',],
            datasets: [{
                  label: '# fund release',
                  data: [20,5,25],
                  backgroundColor: [
                     '#16a085',
                     '#f1c40f',
                     '#2980b9'
                  ],
                  borderColor: [
                     '#16a085',
                     '#f1c40f',
                     '#2980b9'
                  ],
                  borderWidth: 1
            }]
         },
         options: {
            rotation:Math.PI*-10.5,
            animation:{
               animatescale:true
            },
            
         }
      }); 
      chart.canvas.parentNode.style.height = '100%';

  });

  $(function () {
      // ChartJS
      var ctx = document.getElementById('Chart2').getContext('2d');
      console.log(Chart.defaults.scale.ticks);
      Chart.defaults.scale.ticks.beginAtZero=true;
      var chart = new Chart(ctx, {
         type: 'horizontalBar', // The type of chart we want to create
         data: {
            labels: ['January','February','March','April','May','June','July','August','September','Octomber','November','December'],
            datasets: [{
                  label: 'Victims per Year',
                  data: [100,200,400,300,250,140,370,200,300,200],
                  // backgroundColor:'#4cd84c',
                  hoverBackgroundColor:'#00FF00',
                  borderColor:'#00FF00',
                  borderWidth: 2
            }]
         },
         options: {
            scales: {
                  yAxes: [{
                     ticks: {
                        beginAtZero: true
                     }
                  }]
            },
            maintainAspectRatio: false

         }
      }); 
      chart.canvas.parentNode.style.height = '100%';

  });



  
  $(function () {
      // ChartJS
      var ctx = document.getElementById('Chart3').getContext('2d');
      console.log(Chart.defaults.scale.ticks);
      Chart.defaults.scale.ticks.beginAtZero=true;
      var chart = new Chart(ctx, {
         type: 'line', // The type of chart we want to create
         data: {
            labels: ['January','February','March','April','May','June','July','August','September','Octomber','November','December'],
            datasets: [{
                  label: 'deliveries Made',
                  data: [100,200,400,300,250,140,370,200,300,200],
                  backgroundColor:'#4cd84c',
                  hoverBackgroundColor:'#00FF00',
                  borderColor:'#00FF00',
                  borderWidth: 2
            }]
         },
         options: {
            scales: {
                  yAxes: [{
                     ticks: {
                        beginAtZero: true
                     }
                  }]
            },
            maintainAspectRatio: false

         }
      }); 
      chart.canvas.parentNode.style.height = '100%';

  });


  


function calendar(){
   var day=['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
   var month=['January','February','March','April','May','June','July','August','September','October','November','December'];
   var d=new Date();
   console.log(day[d.getDay()]);
   $('#calendar_day').text(day[d.getDay()]);
   // setText('calendar_day', day[d.getDay()]);
   setText('calendar_date', d.getDate());
   setText('calendar_month', month[d.getMonth()]);
   setText('calendar_year', (1900+d.getYear()));
};

//this function will set the text value of tags
function setText(id, val){
    if(val < 10){
        val = '0' + val;    //add leading 0 if val < 10
    }
    document.getElementById(id).innerHTML = val;
};

//call calendar() when page load
window.onload = calendar;


</script>











<?php

   break;

   case "ministry":  // divisional secretary's sidebar elements 
   
?>

<div class="divisionDashboard">
   <div class="grid_box">
      <div class="box-1">
      <div class="nav_link"><B>GROSS INCOME</B></div>

         <canvas id="Chart1"></canvas>
      </div>
      <div class="box-2">
      <!-- <div class="nav_link"><B>FUND DELIVERY ANALYSIS</B></div> -->
         <canvas id="Chart2"></canvas>
      </div>
      <div class="box-3" id="box_3">
      <!-- <h1><B><?php echo $_SESSION['username']?></B></h1>
      <h1><B><?php echo $_SESSION['userrole']?></B></h1>
      <h1><B><?php echo $_SESSION['regionName']?></B></h1> -->
         <div id="calendardate">
            <p id="calendar_day"></p>
            <p id="calendar_date"></p>
            <p id="calendar_month"></p>
            <p id="calendar_year"></p>
         </div>
         <div id="calendar_events" style="height:100%;">
         <h3>Your Events</h3>
            <!-- <?php echo $_SESSION['userrole']; ?> -->
            <?php

               $userid=$_SESSION['userid'];

               $sql="SELECT title,start_event FROM events WHERE events.userid=$userid ";
               $res=$con->query($sql);
               $rgn=$res->fetch_all(MYSQLI_ASSOC); 
               $event="You Have No Event";
               if($rgn==NULL){
                  print ' <h3> ' . $event . ' </h3>';
               }
               else{
                  foreach ($rgn as $key ) {
                     $_SESSION['title']=$key['title'];
                     $_SESSION['start_event']=$key['start_event'];
                     print ' <h5> ' . $key['start_event'] . ' </h5>';
                     print ' <h5> ' . $key['title'] . ' </h5>';
                     // print" <h3 style='color: black;'>'.$_SESSION['title'].'</h3>";
                  } 
                 

               }                       
            ?>
         </div>
      </div>
      <div class="box-4">
         <div>
            <canvas id="Chart3"></canvas>
         </div>
      </div>
   </div>
</div>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<!-- ChartJS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>
   $( document ).ready(function() {
      $('#box_3').click(function(){
         window.location.href='/fadts/calender/ViewCalender';
      })
   });


   $(function () {
      var ctx = document.getElementById('Chart1').getContext('2d');
      var chart = new Chart(ctx, {
         type: 'doughnut',
         data: {
            labels: ['Law Income', 'Middle Income','High Income',],
            datasets: [{
                  label: '# fund release',
                  data: [20,5,25],
                  backgroundColor: [
                     '#16a085',
                     '#f1c40f',
                     '#2980b9'
                  ],
                  borderColor: [
                     '#16a085',
                     '#f1c40f',
                     '#2980b9'
                  ],
                  borderWidth: 1
            }]
         },
         options: {
            rotation:Math.PI*-10.5,
            animation:{
               animatescale:true
            },
            
         }
      }); 
      chart.canvas.parentNode.style.height = '100%';

  });

  $(function () {
      // ChartJS
      var ctx = document.getElementById('Chart2').getContext('2d');
      console.log(Chart.defaults.scale.ticks);
      Chart.defaults.scale.ticks.beginAtZero=true;
      var chart = new Chart(ctx, {
         type: 'horizontalBar', // The type of chart we want to create
         data: {
            labels: ['January','February','March','April','May','June','July','August','September','Octomber','November','December'],
            datasets: [{
                  label: 'Victims per Year',
                  data: [100,200,400,300,250,140,370,200,300,200],
                  backgroundColor:'#4cd84c',
                  hoverBackgroundColor:'rgb(4, 17, 41)',
                  borderColor:'rgb(4, 17, 41)',
                  borderWidth: 2
            }]
         },
         options: {
            scales: {
                  yAxes: [{
                     ticks: {
                        beginAtZero: true
                     }
                  }]
            },
            maintainAspectRatio: false

         }
      }); 
      chart.canvas.parentNode.style.height = '100%';

  });



  
  $(function () {
      // ChartJS
      var ctx = document.getElementById('Chart3').getContext('2d');
      console.log(Chart.defaults.scale.ticks);
      Chart.defaults.scale.ticks.beginAtZero=true;
      var chart = new Chart(ctx, {
         type: 'line', // The type of chart we want to create
         data: {
            labels: ['January','February','March','April','May','June','July','August','September','Octomber','November','December'],
            datasets: [{
                  label: 'deliveries Made',
                  data: [100,200,400,300,250,140,370,200,300,200],
                  // backgroundColor:'#4cd84c',
                  hoverBackgroundColor:'#00FF00',
                  borderColor:'#00FF00',
                  borderWidth: 2
            }]
         },
         options: {
            scales: {
                  yAxes: [{
                     ticks: {
                        beginAtZero: true
                     }
                  }]
            },
            maintainAspectRatio: false

         }
      }); 
      chart.canvas.parentNode.style.height = '100%';

  });


  


function calendar(){
   var day=['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
   var month=['January','February','March','April','May','June','July','August','September','October','November','December'];
   var d=new Date();
   console.log(day[d.getDay()]);
   $('#calendar_day').text(day[d.getDay()]);
   // setText('calendar_day', day[d.getDay()]);
   setText('calendar_date', d.getDate());
   setText('calendar_month', month[d.getMonth()]);
   setText('calendar_year', (1900+d.getYear()));
};

//this function will set the text value of tags
function setText(id, val){
    if(val < 10){
        val = '0' + val;    //add leading 0 if val < 10
    }
    document.getElementById(id).innerHTML = val;
};

//call calendar() when page load
window.onload = calendar;


</script>







<?php 
   
   break; 

   }

?>

<?php include VIEW.'includes/footer.php' ?>
