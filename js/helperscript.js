function _(x) {
  return document.getElementById(x);
}
function clean(x) {
  return x.value.length;
}

let course_form = _("course-form");
let department = _("department");
let semester = _("semester");
let lecturer = _("teacher");
let title = _("title");
let code = _("code");
let type = _("type");
let duration = _("duration");
let btnCF = _("btn-course-form");
let formError = _("form-error");
course_form.onsubmit = function(e) {
  e.preventDefault();
  // CHECK ALL THE VALUES
  if (
    clean(department) > 0 &&
    clean(semester) > 0 &&
    clean(lecturer) > 0 &&
    clean(title) > 0 &&
    clean(code) > 0 &&
    clean(type) > 0 &&
    clean(duration) > 0
  ) {
    // formError.innerHTML =
    //   '<span class="text-success">You are good to go</span>';
    // SEND TO BACKEND
    $.ajax({
      url: "./action.php",
      method: "POST",
      data: {
        department: department.value,
        semester: semester.value,
        lecturer: lecturer.value,
        title: title.value,
        code: code.value,
        type: type.value,
        duration: duration.value,
        registerCourse: true
      },
      success: function(data) {
        if (
          data.trim() ===
          "<span class='text-success'>Course Registered Successfully</span>"
        ) {
          formError.innerHTML = `<span>${data}</span>`;
          inputArrays = [
            department,
            semester,
            lecturer,
            title,
            code,
            type,
            duration
          ];

          inputArrays.forEach(element => {
            element.value = "";
          });
        } else {
          formError.innerHTML = `<span>${data}</span>`;
        }
      }
    });
  } else {
    formError.innerHTML =
      '<span class="text-danger">All fields required</span>';
  }
};
