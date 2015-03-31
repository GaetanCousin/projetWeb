//||||||||||
		//Variables|
		//||||||||||
		var timer,zero,w,lf,el;
		var tab=new Array();
		var pos=0;
		var val=0;
		var oui=true;
		 
		 
		//||||||||||||||||||||||||
		//Variables param?trables|
		//||||||||||||||||||||||||
		var M=100;// marge de gauche de la bo?te ? images;
		 
		var W=300;// largeur de la bo?te ? images
		// (forc?ment sup?rieure ? la somme des largeurs des images);
		 
		var H=100;// hauteur de la bo?te ? images;
		 
		var delai=Math.round(W/4);// le d?lai initial est d'un quart
		// de la largeur de la bo?te;
		 
		 
		//|||||||||||||||||||||
		//Cr?ation de la bo?te|
		//|||||||||||||||||||||
		var c=document.createElement('div');
		c.id="c";
		c.style.marginLeft=M+"px";
		c.style.width=W+"px";
		c.style.height=H+"px";
		 
		var dec=M+W/2;// position horizontale au centre de la bo?te;
		 
		 
		//||||||||||||||||||||
		//Cr?ation des images|
		//||||||||||||||||||||
		for(i=0;i!=60;i++){
		   zero= i<9 ? 0 : "";
		   tab[i]=new Image();
		   tab[i].src="http:/ /javatwist.imingo.net/sm"+zero+(i+1)+".gif";
		   c.appendChild(tab[i]);
		}
		document.body.replaceChild(c,document.getElementById('nul'));
		 
		 
		//|||||||||||||||||||||||
		//D?placement des images|
		//|||||||||||||||||||||||
		function go(){
		for(i in tab){
		   lf=parseInt(tab[i].style.left);
		   w=tab[i].width;
		   tab[i].style.left=lf+val+"px";
		   if(lf>pos-w){
			  tab[i].style.left=lf-pos+"px"};
		   if(lf<W-pos){
			  tab[i].style.left=lf+pos+"px"};
		}
		timer=setTimeout("go()",delai)
		}
		 
		 
		//||||||||||||||||
		//Vitesse et sens|
		//||||||||||||||||
		function speed(e){
		el= (!e) ? event.clientX : e.pageX;
		 
		if(el>=dec){
		   delai=W/2+2-(el-dec);val=2}// val=d?placement
		else{
		   delai=W/2-1-(dec-el);val=-2};// val=d?placement
		}
		 
		 
		//||||||||||||||||||||||||
		//Gestionnaire de "speed"|
		//||||||||||||||||||||||||
		c.onmousemove=speed;
		 
		 
		//|||||||||||||||||||||||||||||||||||||||||||||||||
		//Pause / relance du script / activation des liens|
		//|||||||||||||||||||||||||||||||||||||||||||||||||
		c.onclick=function(){
		   if(oui){clearTimeout(timer);oui=false;
			  for(i in tab){
				 tab[i].style.cursor="pointer"};
		   }
		   else{go();oui=true;
			  for(i in tab){
				 tab[i].style.cursor="default"};
		   };
		}
		 
		 
		//||||||||||||||||||||
		//Lancement des liens|
		//||||||||||||||||||||
		for(i in tab){
		   tab[i].onclick=function(){
			  if(this.style.cursor=="pointer"){
				 window.open(this.src)}
			  };
		}
		 
		//|||||||||||||||||||||||||||||||||||||||||||||||||
		//Positionnement des images et lancement du script|
		//|||||||||||||||||||||||||||||||||||||||||||||||||
		onload=function(){
		document.body.removeChild(document.getElementById("mess"));
		c.style.display="block";
		for(i in tab){
		tab[i].style.left=pos+"px";
		tab[i].style.top=(H-tab[i].height)/2+"px";
		tab[i].style.display="inline";
		pos+=tab[i].width;
		}
		go();
		}