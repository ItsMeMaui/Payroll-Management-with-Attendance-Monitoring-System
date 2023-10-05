
<!-- moment js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>


<!-- edit employee -->
<script>
  $(document).ready(function() {
    $("body").on("click", ".editempbtnclass", function(event) {
      $tr = $(this).closest('tr');
      var data = $tr.children("td").map(function() {
        return $(this).text();
      }).get();
      $('#updateUserID').val(data[0]);
      $('#fnameIDvalue').val(data[1]);
      $('#mnameIDvalue').val(data[2]);
      $('#lnameIDvalue').val(data[3]);
      $('#roleIDvalue').val(data[5]);
      $('#fingerprintIDvalue').val(data[7]);
      console.log(data);
    })
  });
</script>

<!-- edit role -->
<script>
  $(document).ready(function() {
    $("body").on("click", ".editrolebtnclass", function(event) {
      $tr = $(this).closest('tr');
      var data = $tr.children("td").map(function() {
        return $(this).text();
      }).get();
      $('#updateRoleID').val(data[0]);
      $('#positionID').val(data[1]);
      $('#positionRate').val(data[2]);
      $('#lnameIDvalue').val(data[3]);
      $('#roleIDvalue').val(data[5]);
      $('#fingerprintIDvalue').val(data[7]);
      console.log(data);
    })
  });
</script>

<!-- edit user -->
<script>
  $(document).ready(function() {
    $("body").on("click", ".edituserbtnclass", function(event) {
      $tr = $(this).closest('tr');
      var data = $tr.children("td").map(function() {
        return $(this).text();
      }).get();
      $('#updateuserIDvalue').val(data[7]);
      $('#updateusernameID').val(data[2]);
      $('#update_current_username').val(data[2]);
      
      $('#currentPasswordID').val(data[3]);


      console.log(data);
    })
  });
</script>


</body>


<!-- tables -->
<script>
  let table = new DataTable('.employee_table', {
    order: [9, 'desc']
  });
  let table2 = new DataTable('.attendance_table', {
    order: [6, 'desc']
  });
  let table3 = new DataTable('.roles_table', {
    order: [0, 'desc']
  });
  let table4 = new DataTable('.users_table', {
    order: [0, 'desc']
  });
  let table5 = new DataTable('.payroll_table', {
    order: [0, 'desc']
  });
</script>




<!-- jquery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<!-- datatables -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/v/dt/jszip-3.10.1/dt-1.13.6/b-2.4.2/b-html5-2.4.2/b-print-2.4.2/datatables.min.js"></script>


<!-- fontawesome -->
<script src="https://kit.fontawesome.com/7102b39166.js" crossorigin="anonymous"></script>

<!-- flowbite -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>


<script>
  function fetch(start_date, end_date) {
    $.ajax({
      url: "../classes/records.php",
      type: "POST",
      data: {
        start_date: start_date,
        end_date: end_date

      },
      dataType: "json",
      success: function(data) {


        var i = "1";
        $('#records_table').DataTable({
          "data": data,
          dom: 'Bfrtip',
          buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],

          //responsive
          "responsive": true,
          "columns": [{
              "data": "attendance_id",
              "visible": false,
            },
            {
              "data": "emp_id",
              "visible": false,
            },
            {
              "data": "emp_fname,emp_mname,emp_lname",
              "render": function(data, type, row, meta) {
                return row.emp_fname + ' ' + (row.emp_mname ? row.emp_mname + ' ' : '') + row.emp_lname;
              }
            },
            {
              "data": "attendance_date",
              "render": function(data, type, row, meta) {
                return moment(row.attendance_date).format('MM-DD-YYYY')
              }
            },
            {
              "data": "attendance_timein",
              "render": function(data, type, row, meta) {
                return moment(row.attendance_timein, 'HH:mm:ss').format('h:mm:ss A')
              }
            },
            {
              "data": "attendance_timeout",
              "render": function(data, type, row, meta) {
                return moment(row.attendance_timeout, 'HH:mm:ss').format('h:mm:ss A')
              }
            },
            {
              "data": "attendance_hour"
            },
          ]
        })
      }
    })
  }
  fetch();

  $(document).on("click", "#filter", function(e) {
    e.preventDefault();
    var start_date = $("#start_date").val();
    var end_date = $("#end_date").val();
    console.log(start_date)
    if (start_date == "" || end_date == "") {
      alert("both date required");
    } else {
      if ($.fn.DataTable.isDataTable('#records_table')) {
        $('#records_table').DataTable().destroy();
      }
      fetch(start_date, end_date);
    }
  });
  $(document).on("click", "#reset", function(e) {
    e.preventDefault();
    $("#start_date").val('');
    $("#end_date").val('');
    if ($.fn.DataTable.isDataTable('#records_table')) {
        $('#records_table').DataTable().destroy();
      }
      fetch();
  });
</script>


</html>