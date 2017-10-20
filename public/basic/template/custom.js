var ctz = 1;

function new_modelz()
{
	ctz++;
	var tr1 = document.createElement('tr');
	//td1.className = "tdwo"+ctz;
	
	tr1.id = ctz;

	// link to delete extended form elements
var selectBrand = '<td><input style="margin-left: 0px; margin-right: 0px; width: 150px;" type="text" name="model[]" value=""></td><td><?php echo list_brands(); ?><a href="javascript:delModel('+ ctz +')"> <span style="font-size: 24px; line-height: 1.5em;"><i class="icon-minus-sign-alt"></i></span> </a></td><td><input style="margin-left: 0px; margin-right: 0px; width: 160px;" type="file" name="phone_image[]" value=""></td>';

	tr1.innerHTML = document.getElementById('newformtpl').innerHTML + selectBrand;
	
	document.getElementById('newform').appendChild(tr1);
	
}
// function to delete the newly added set of elements
function delModel(eleId)
{
	d = document;

	var ele = d.getElementById(eleId);

	var parentEle = d.getElementById('newform');

	parentEle.removeChild(ele);

}




var ctbz = 1;

function new_brands()
{
	ctbz++;
	var tr1 = document.createElement('tr');
	//td1.className = "tdwo"+ctbz;
	
	tr1.id = ctbz;

	// link to delete extended form elements
var selectBrand = '<td><input style="margin-left: 0px; margin-right: 0px; width: 150px;" type="text" name="brand[]" value=""><a href="javascript:delBrand('+ ctbz +')"> <span style="font-size: 24px; line-height: 1.5em;"><i class="icon-minus-sign-alt"></i></span> </a></td><td><input style="margin-left: 0px; margin-right: 0px; width: 160px;" type="file" name="brand_image[]" value=""></td>';

	tr1.innerHTML = document.getElementById('newformtpl').innerHTML + selectBrand;
	
	document.getElementById('newform').appendChild(tr1);
	
}
// function to delete the newly added set of elements
function delBrand(eleId)
{
	d = document;

	var ele = d.getElementById(eleId);

	var parentEle = d.getElementById('newform');

	parentEle.removeChild(ele);

}





var ct = 1;

function new_link()
{
	ct++;
	var tr1 = document.createElement('tr');
	//td1.className = "tdwo"+ct;
	
	tr1.id = ct;

	// link to delete extended form elements
var delLink = '<td><input style="margin-left: 0px; margin-right: 0px; width: 280px;" type="text" name="issue[]" value=""></td><td> &#8364; <input style="margin-left: 0px; margin-right: 0px; width: 80px;" type="text" name="price[]" value=""></td> <td><?php echo list_modelz(); ?><a href="javascript:delIt('+ ct +')"> <span style="font-size: 24px; line-height: 1.5em;"><i class="icon-minus-sign-alt"></i></span> </a></td>';

	tr1.innerHTML = document.getElementById('newformtpl').innerHTML + delLink;
	
	document.getElementById('newform').appendChild(tr1);
	
}
// function to delete the newly added set of elements
function delIt(eleId)
{
	d = document;

	var ele = d.getElementById(eleId);

	var parentEle = d.getElementById('newform');

	parentEle.removeChild(ele);

}






var attch = 1;

function new_attachment()
{
	attch++;
	var tr1 = document.createElement('tr');
	tr1.id = attch;

	// link to delete extended form elements
var selectBrand = '<td><input style="margin-left: 0px; margin-right: 0px; width: 160px;" type="file" name="mail_attachment[]" value=""></td><td><a href="javascript:delBrand('+ attch +')"> <span style="font-size: 24px; line-height: 1.5em;"><i class="icon-minus-sign-alt"></i></span> </a></td>';

	tr1.innerHTML = document.getElementById('newformtpl').innerHTML + selectBrand;
	
	document.getElementById('newform').appendChild(tr1);
	
}
// function to delete the newly added set of elements
function delModel(eleId)
{
	d = document;

	var ele = d.getElementById(eleId);

	var parentEle = d.getElementById('newform');

	parentEle.removeChild(ele);

}