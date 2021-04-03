function validate(){
	var salary = document.form.salary.value.trim();
	if(salary<0){
	document.getElementById('salary_error').innerHTML='Salary Cannot be Negative';
	return false;
	}
	var edate = document.form.edate.value.trim();
	var date = edate.split("/").reverse();
	var date1=new Date().toISOString().substring(0, 10);
	 if(date<date1){
	document.getElementById('date_error').innerHTML='Expiry Date Error';
	return false;
	}


}