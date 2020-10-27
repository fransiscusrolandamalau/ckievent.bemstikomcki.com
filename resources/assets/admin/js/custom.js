("use strict");
var $dtBasic = $("#datatable-basic");
$dtBasic.DataTable({
  keys: !0,
  select: {
    style: "multi",
  },
  language: {
    paginate: {
      previous: "<i class='fas fa-angle-left'>",
      next: "<i class='fas fa-angle-right'>",
    },
  },
  processing: true,
  ajax: { url: "http://localhost/argon/employees.json", dataSrc: "" },
  deferLoading: 57,
  columns: [
    {
      data: "employee_id",
    },
    {
      data: null,
      render: function (data, type, name) {
        return name.fname + " " + name.lname;
      },
    },
    {
      data: "email",
    },
    {
      data: null,
      render: function (data, type, date) {
        return formatDate(date.created);
      },
    },
    {
      data: "location_id",
    },
    {
      data: "employee_status_id",
    },
  ],
});

function formatDate(date) {
  var d = new Date(date),
    month = "" + (d.getMonth() + 1),
    day = "" + d.getDate(),
    year = "" + d.getFullYear();
  if (month.length < 2) {
    month = "0" + month;
  }
  if (day.length < 2) {
    day = "0" + day;
  }
  return [year, month, day].join("/");
}
