calc = document.getElementById("calc");
 kg = document.getElementById("kg");
 m = document.getElementById("m");
 imc = document.getElementById("imc");
 lectura = document.getElementById("lectura");
 

 calc.onclick = function(){
   if(kg.value!="" && m.value!=""){
     imcx = (kg.value / (m.value* m.value));
     imc = imcx.toFixed(2);

     if(imcx<18.5) imcx = Swal.fire({
      title: 'Peso inferior al normal',
      text: 'Tu IMC es :' + (imc),
      confirmButtonText: 'Salir'
     }); 
     else if(imcx>=18.5 && imcx<=24.9) imcx = Swal.fire({
      title: 'Peso normal',
      text: 'Tu IMC es :' + (imc),
      confirmButtonText: 'Salir'
     }); 
     else if(imcx>=25 && imcx<=29.9) imcx = Swal.fire({
      title: 'Peso superior a lo normal',
      text: 'Tu IMC es :' + (imc),
      confirmButtonText: 'Salir'
     }); 
     else if(imcx>30) imcx = Swal.fire({
      title: 'Obesidad',
      text: 'Tu IMC es :' + (imc),
      confirmButtonText: 'Salir'
     });

   }else{
    Swal.fire({
      title: 'Debes ingresar peso y altura',
      icon: 'error',
      confirmButtonText: 'Salir'
     })
   }

 };

  document.getElementById('m').addEventListener('input', function(){
    if(this.value.length > 2){
      var val = this.value.replace(/[^\d]/, '');
      val = val.substr(0, val.length-2)+"."+val.substr(-2);
      this.value = val;
    }
  });