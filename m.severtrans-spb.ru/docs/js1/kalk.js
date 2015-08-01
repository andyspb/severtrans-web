function formReset()
{
	var q = 0;
document.getElementById("frm1").reset();
document.getElementById('rezultat').innerHTML = q;
document.getElementById('tarif').innerHTML = q;
document.getElementById('cena').innerHTML = q;
document.getElementById('rez').innerHTML = q;

};
function changeText0(){
 var rezultat1 = 1;
 var rezultat2 = 1;
 var r = 1;
 var rez = 0;
 var t = 1;
 var k = 1;
 var z = 0;
 var flag1 = parseFloat(document.getElementById('gorod').options[document.getElementById('gorod').selectedIndex].value);
 
 var flag2 = parseFloat(document.getElementById('dveri').options[document.getElementById('dveri').selectedIndex].value);
 
 rezultat1 *= parseFloat(document.getElementById('b').value) * 200;
 rezultat2 *= parseFloat(document.getElementById('a').value);
 if (parseFloat(document.getElementById('b').value) * 200 > parseFloat(document.getElementById('a').value))
 {document.getElementById('rezultat').innerHTML = rezultat1;
  r *= rezultat1;}
 else
 {document.getElementById('rezultat').innerHTML = rezultat2;
  r *= rezultat2;};
 if (document.getElementById('gabarit').checked)
     var gab = parseFloat(document.getElementById('gabarit').value);
 if (document.getElementById('nogabarit').checked)
     var gab = parseFloat(document.getElementById('nogabarit').value);
	
 k *= parseFloat(document.getElementById('c').value);
if (k >= r * 100)
{z += (k - (r * 100)) * 0.003;
document.getElementById('cena').innerHTML = z;}
else 
{z += 0;
document.getElementById('cena').innerHTML = z;};

if (flag1 == 1)
{
	if (r < 200)
	{t *= 5.00;
	 rez += r * (t + flag2);
	 rez += rez * gab + z;}
	 else 
	    {
			if (r >= 200 && r < 500)
		    {t *= 4.80;
	         rez += r * (t + flag2);
	         rez += rez * gab + z;
			 }
		    else 
		    {
			   if (r >= 500 && r < 1000)
		          {t *= 4.70;
	               rez += r * (t + flag2);
	               rez += rez * gab + z;}
		        else 
		        {
					if (r >= 1000 && r < 2000)
		              {t *= 4.60;
	                  rez += r * (t + flag2);
	                  rez += rez * gab + z;}
			          else 
				      {
					   t *= 4.50;
	                   rez += r * (t + flag2);
	                   rez += rez * gab + z;
					};
				 }
			}
		}; 
		
		
		
		document.getElementById('tarif').innerHTML = t + flag2;
		if (flag2 == 0)
	       { if (rez >= 400)
		     document.getElementById('rez').innerHTML = rez;
			
			 
		      else {
				  rez *= 0;
				  rez += 400 + 400 * gab + z;
				  document.getElementById('rez').innerHTML = rez;};}
		   else {
			   if (rez >= 800)
		     document.getElementById('rez').innerHTML = rez
		      else 
			  {
				  rez *= 0;
				  rez += 800 + 800 * gab + z;
				  document.getElementById('rez').innerHTML = rez;};
			};
		   
		   }
else 
  { 
  if (flag1 == 2)
        { 
		  if (r < 200)
	      {t *= 7.00;
	      rez += r * (t + flag2);
	      rez += rez * gab + z;}
	   else 
	    {
			if (r >= 200 && r < 500)
		    {t *= 6.80;
	         rez += r * (t + flag2);
	         rez += rez * gab + z;
			 }
		    else 
		    {
			   if (r >= 500 && r < 1000)
		          {t *= 6.70;
	               rez += r * (t + flag2);
	               rez += rez * gab + z;}
		        else 
		        {
					if (r >= 1000 && r < 2000)
		              {t *= 6.60;
	                  rez += r * (t + flag2);
	                  rez += rez * gab + z;}
			       else 
				   {
					   t *= 6.50;
	                   rez += r * (t + flag2);
	                   rez += rez * gab + z;
					};
				 }
			}
		}; 
		document.getElementById('tarif').innerHTML = t + flag2;
	    if (flag2 == 0)
	       { if (rez >= 400)
		     document.getElementById('rez').innerHTML = rez
		      else {
				  rez *= 0;
				  rez += 400 + 400 * gab + z;
				  document.getElementById('rez').innerHTML = rez;};}
		   else {
			   if (rez >= 800)
		     document.getElementById('rez').innerHTML = rez
		      else 
			  {
				  rez *= 0;
				  rez += 800 + 800 * gab + z;
				  document.getElementById('rez').innerHTML = rez;};
			};
		   
  }
	else {
		
		if (flag1 == 3)
        { 
		  if (r < 200)
	      {t *= 8.50;
	      rez += r * (t + flag2);
	      rez += rez * gab + z;}
	   else 
	    {
			if (r >= 200 && r < 500)
		    {t *= 8.20;
	         rez += r * (t + flag2);
	         rez += rez * gab + z;
			 }
		    else 
		    {
			   if (r >= 500 && r < 1000)
		          {t *= 7.90;
	               rez += r * (t + flag2);
	               rez += rez * gab + z;}
		        else 
		        {
					if (r >= 1000 && r < 2000)
		              {t *= 7.70;
	                  rez += r * (t + flag2);
	                  rez += rez * gab + z;}
			       else 
				   {
					   t *= 7.50;
	                   rez += r * (t + flag2);
	                   rez += rez * gab + z;
					};
				 }
			}
		}; 
		document.getElementById('tarif').innerHTML = t + flag2;
	    if (flag2 == 0)
	       { if (rez >= 400)
		     document.getElementById('rez').innerHTML = rez
		      else {
				  rez *= 0;
				  rez += 400 + 400 * gab + z;
				  document.getElementById('rez').innerHTML = rez;};}
		   else {
			   if (rez >= 800)
		     document.getElementById('rez').innerHTML = rez
		      else 
			  {
				  rez *= 0;
				  rez += 800 + 800 * gab + z;
				  document.getElementById('rez').innerHTML = rez;};
			};
  }
		else {
			
			if (flag1 == 4)
        { 
		  if (r < 200)
	      {t *= 9.00;
	      rez += r * (t + flag2);
	      rez += rez * gab + z;}
	   else 
	    {
			if (r >= 200 && r < 500)
		    {t *= 8.70;
	         rez += r * (t + flag2);
	         rez += rez * gab + z;
			 }
		    else 
		    {
			   if (r >= 500 && r < 1000)
		          {t *= 8.40;
	               rez += r * (t + flag2);
	               rez += rez * gab + z;}
		        else 
		        {
					if (r >= 1000 && r < 2000)
		              {t *= 8.20;
	                  rez += r * (t + flag2);
	                  rez += rez * gab;}
			       else 
				   {
					   t *= 8.00;
	                   rez += r * (t + flag2);
	                   rez += rez * gab + z;
					};
				 }
			}
		};
		document.getElementById('tarif').innerHTML = t + flag2; 
	    if (flag2 == 0)
	       { if (rez >= 400)
		     document.getElementById('rez').innerHTML = rez
		      else {
				  rez *= 0;
				  rez += 400 + 400 * gab + z;
				  document.getElementById('rez').innerHTML = rez;};}
		   else {
			   if (rez >= 800)
		     document.getElementById('rez').innerHTML = rez
		      else 
			  {
				  rez *= 0;
				  rez += 800 + 800 * gab + z;
				  document.getElementById('rez').innerHTML = rez;};
			};
		   
  }
		else {
			if (flag1 == 5)
        {
		  if (r < 200)
	      {t *= 9.00;
	      rez += r * t;
	      rez += rez * gab + z;}
	   else 
	    {
			if (r >= 200 && r < 500)
		    {
				t *= 8.80;
	            rez += r * t;
	            rez += rez * gab + z;
			 }
		    else 
		    {
			   if (r >= 500 && r < 1000)
		          {
					  t *= 8.70;
					  rez += r * t;
					  rez += rez * gab + z;}
		        else 
		        {
					if (r >= 1000 && r < 2000)
		              {
						  t *= 8.60;
						  rez += r * t;
	                      rez += rez * gab + z;}
			       else 
				   {
					   t *= 8.50;
	                   rez += r * t;
	                   rez += rez * gab + z;
					};
				 }
			}
		}; 
		document.getElementById('tarif').innerHTML = t;
	   if (flag2 == 0)
	       { if (rez >= 400)
		     document.getElementById('rez').innerHTML = rez
		      else {
				  rez *= 0;
				  rez += 400 + 400 * gab + z;
				  document.getElementById('rez').innerHTML = rez;};}
		   else {
			   if (rez >= 800)
		     document.getElementById('rez').innerHTML = rez
		      else 
			  {
				  rez *= 0;
				  rez += 800 + 800 * gab + z;
				  document.getElementById('rez').innerHTML = rez;};
			};
		   
  }
  		else {
			if (flag1 == 6)
        { 
		  if (r < 200)
	      {t *= 8.00;
	       rez += r * t;
	      rez += rez * gab + z;}
	   else 
	    {
			if (r >= 200 && r < 500)
		    {t *= 7.70;
	         rez += r * t;
	         rez += rez * gab + z;
			 }
		    else 
		    {
			   if (r >= 500 && r < 1000)
		          {t *= 7.50;
	               rez += r * t;
	               rez += rez * gab + z;}
		        else 
		        {
					if (r >= 1000 && r < 2000)
		              {t *= 7.20;
	                  rez += r * t;
	                  rez += rez * gab + z;}
			       else 
				   {
					   t *= 7.00;
	                   rez += r * t;
	                   rez += rez * gab + z;
					};
				 }
			}
		};
		document.getElementById('tarif').innerHTML = t; 
	    if (flag2 == 0)
	       { if (rez >= 400)
		     document.getElementById('rez').innerHTML = rez
		      else {
				  rez *= 0;
				  rez += 400 + 400 * gab + z;
				  document.getElementById('rez').innerHTML = rez;};}
		   else {
			   if (rez >= 800)
		     document.getElementById('rez').innerHTML = rez
		      else 
			  {
				  rez *= 0;
				  rez += 800 + 800 * gab + z;
				  document.getElementById('rez').innerHTML = rez;};
			};
		   
  }
		else {
			if (flag1 == 7)
        { 
		  if (r < 200)
	      {t *= 11.00;
	      rez += r * t;
	      rez += rez * gab + z;}
	   else 
	    {
			if (r >= 200 && r < 500)
		    {t *= 10.50;
	         rez += r * t;
	         rez += rez * gab + z;
			 }
		    else 
		    {
			   if (r >= 500 && r < 1000)
		          {t *= 10.00;
	               rez += r * t;
	               rez += rez * gab + z;}
		        else 
		        {
					if (r >= 1000 && r < 2000)
		              {t *= 9.50;
	                  rez += r * t;
	                  rez += rez * gab + z;}
			       else 
				   {
					   t *= 9.00;
	                   rez += r * t;
	                   rez += rez * gab + z;
					};
				 }
			}
		}; 
		document.getElementById('tarif').innerHTML = t;
	   if (flag2 == 0)
	       { if (rez >= 400)
		     document.getElementById('rez').innerHTML = rez
		      else {
				  rez *= 0;
				  rez += 400 + 400 * gab + z;
				  document.getElementById('rez').innerHTML = rez;};}
		   else {
			   if (rez >= 800)
		     document.getElementById('rez').innerHTML = rez
		      else 
			  {
				  rez *= 0;
				  rez += 800 + 800 * gab + z;
				  document.getElementById('rez').innerHTML = rez;};
			};
		   
  }
			
			
			
			};	
			};
			};	
			};
		
		
		
		};  
	  
	  };
	};
