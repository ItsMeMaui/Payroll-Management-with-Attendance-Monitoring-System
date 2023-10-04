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

<script>
  $(document).ready(function() {
    $("body").on("click", ".edituserbtnclass", function(event) {
      $tr = $(this).closest('tr');
      var data = $tr.children("td").map(function() {
        return $(this).text();
      }).get();
      $('#updateuserIDvalue').val(data[0]);
      $('#updateusernameID').val(data[2]);
      $('#updatepasswordID').val(data[3]);
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
    order: [0, 'desc']
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





<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<!-- fontawesome -->
<script src="https://kit.fontawesome.com/7102b39166.js" crossorigin="anonymous"></script>

<!-- flowbite -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>





</html>