$(document).ready(function() {

  let mySelect = new vanillaSelectBox("#counties",{
    maxWidth: 500,
    maxHeight: 400,
    minWidth: 540,
    search: true,
    placeHolder: "Select Places to Sell"
});
mySelect.enable();

let mySelect1 = new vanillaSelectBox("#category",{
  maxWidth: 500,
  maxHeight: 400,
  minWidth: 540,
  search: true,
  placeHolder: "Select Categories"
});
mySelect1.enable();

let mySelect2 = new vanillaSelectBox("#products",{
  maxWidth: 500,
  maxHeight: 400,
  minWidth: 540,
  search: true,
  placeHolder: "Select Products/Services"
});
mySelect2.enable();
});
