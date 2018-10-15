const makeHtml = data => {
    return `<div class="single-tags col-md-2" style=" margin: 5px;">
                    <div class="single-tags-text">
                        <p>${data}</p>
                    </div>
                    <div class="remove-tag">
                        <i class="fa fa-times"></i>
                    </div>
                </div>`;
};
const makeAllHtml = data => {
    $(".tags").empty();
    data.forEach(item => {
        $(".tags").append(makeHtml(item));
    });
};
const firstData = JSON.parse(localStorage.getItem("tags"));
if (firstData) {
    makeAllHtml(firstData);
}
$("#add-new-tags").keypress(function(event) {
    var code = event.keyCode || event.which;
    console.log(111);

    if (
        code == 32 &&
        $(this)
            .val()
            .trim()
    ) {
        $("#form-tags").submit();
    }
});

$("form").submit(function(e) {
    e.preventDefault();
    let value = $("#add-new-tags")
        .val()
        .trim();
    if (!value) {
        alert("Please fill the form");
        return;
    }
    let allData = JSON.parse(localStorage.getItem("tags"));
    if (allData === null) {
        let arr = value.split(",");
        localStorage.setItem("tags", JSON.stringify([value]));
        makeAllHtml(arr);
        return;
    }

    let newData = [...new Set([...allData, ...value.split(",")])];
    makeAllHtml(newData);
    localStorage.setItem("tags", JSON.stringify(newData));

    $("#add-new-tags").tagsinput("removeAll");
});

$("body").on("click", ".remove-tag", function() {
    let value = $(this)
        .closest(".single-tags")
        .find(".single-tags-text")
        .text()
        .trim();
    let allData = JSON.parse(localStorage.getItem("tags"));
    let index = allData.indexOf(value);
    allData.splice(index, 1);
    makeAllHtml(allData);
    localStorage.setItem("tags", JSON.stringify(allData));
});

$("#add-new-tags").tagsinput({
    maxTags: 5,
    confirmKeys: [13, 32, 44]
});
