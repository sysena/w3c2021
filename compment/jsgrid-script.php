<!-- jsGrid -->
<!-- <script src="/adminlte/plugins/jsgrid/demos/db.js"></script> -->
<script src="/adminlte/plugins/jsgrid/jsgrid.min.js"></script>
<script>
  $(function() {
    var gridData = {};
    $.ajax({
      async: false,
      cache: false,
      type: "GET",
      url: "/compment/employee/",
      dataType: "json",
      data: {lastName: "a"  },
      error: function() {
        alert("Get Files Fail!");
      },
      success: function(data) {
        gridData = data;
      }
    });
    //console.log(getobj);

    $("#jsGrid1").jsGrid({
      height: "100%",
      width: "100%",

      sorting: true,
      paging: true,
      pageSize: 10,




      data: gridData,
      
      fields: [{name: "employeeNumber", type: "number",width: 10 },
      {name: "lastName", type: "text",width: 30 },
      {name: "firstName", type: "text",width: 30 },
      {name: "email", type: "text",width: 30 },
      {name: "officeCode", type: "text",width: 30 },
      {name: "reportsTo", type: "text",width: 30 },
      {name: "jobTitle", type: "text",width: 30 }

      ]
    });
  });
</script>