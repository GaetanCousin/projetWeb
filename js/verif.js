//------------------------------------------------------------------------------------------------------------------------
// Fonction de récupération de la valeur d'un bouton radio
//------------------------------------------------------------------------------------------------------------------------
		function get_radio_value(obj)
		{	
			for (i=0; i<obj.length;i++)	{
				if (obj[i].checked) {return obj[i].value;}
			}	
			return -1;
		}


//------------------------------------------------------------------------------------------------------------------------
// Fonction de blocage de la longueur d'un textarea
//------------------------------------------------------------------------------------------------------------------------
		function textarea_eval(Element, longueur)
		{
			with ( document.formulaire )
			{
				if ( eval(Element+".value.length > "+longueur) )
				{
					eval(Element+".value = "+Element+".value.substr(0,"+longueur+")")
					alert ("Le champs ne doit pas dépasser "+longueur+" caractères")
				}
			}
		}


//------------------------------------------------------------------------------------------------------------------------
// Function vérifiant si un élément est vide
//------------------------------------------------------------------------------------------------------------------------
		function Vide(Element)
		{
			pattern = /^\s+$/
			return ( Element.value == "" || pattern.test(Element.value) )
		}


//------------------------------------------------------------------------------------------------------------------------
// Fonction vérifiant si l'élément est alphabétique (alphabet,espace, apostrophe et tiret 
//------------------------------------------------------------------------------------------------------------------------
		function is_alpha(Element)
		{
			pattern = /^[a-zA-Z'éèêëàâäùüûôöîïç, -]+$/
			return pattern.test(Element.value)
		}

//------------------------------------------------------------------------------------------------------------------------
// Fonction vérifiant si l'élément est alphabétique (alphabet,espace, apostrophe, tiret et retour chariot
//------------------------------------------------------------------------------------------------------------------------
		function is_alpha_cr(Element)
		{
			pattern = /^[\n\ra-zA-Z'éèêëàâäùüûôöîïç, ]+$/
			return pattern.test(Element.value)
		}


//------------------------------------------------------------------------------------------------------------------------
// Fonction vérifiant si l'élément est alpha-numérique (alphabet, nombre, espace, apostrophe et tiret 
//------------------------------------------------------------------------------------------------------------------------
		function is_alphanum(Element)
		{
			pattern = /^[0-9a-zA-Z'éèêëàâäùüûôöîïç,?!:;.% -]+$/
			return pattern.test(Element.value)
		}


//------------------------------------------------------------------------------------------------------------------------
// Fonction vérifiant si l'élément est alpha-numérique (alphabet, nombre, espace, apostrophe, tiret et retour chariot
//------------------------------------------------------------------------------------------------------------------------
		function is_alphanum_cr(Element)
		{
			pattern = /^[\n\r0-9a-zA-Z'éèêëàâäùüûôöîïç,?!:;.% ]+$/
			return pattern.test(Element.value)
		}


//------------------------------------------------------------------------------------------------------------------------
// Fonction vérifiant si l'élément correspond à un numéro de téléphone 
//------------------------------------------------------------------------------------------------------------------------
		function is_numero(Element)
		{
			pattern = /^([0-9]{3}-[0-9]{2}-[0-9]{5})|([0-9\-]+)|([0-9]{1,5})$/
			return pattern.test(Element.value)
		}


//------------------------------------------------------------------------------------------------------------------------
// Fonction vérifiant si l'élément est un email valide
//------------------------------------------------------------------------------------------------------------------------
		function is_email(Element)
		{
			pattern = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)+$/i
			return pattern.test(Element.value)
		}


//------------------------------------------------------------------------------------------------------------------------
// Fonction vérifiant si l'élément est numérique
//------------------------------------------------------------------------------------------------------------------------
		function is_numeric(Element)
		{
			pattern = /^\d+$/
			return pattern.test(Element.value)
		}


//------------------------------------------------------------------------------------------------------------------------
// Fonction vérifiant si l'élément est float
//------------------------------------------------------------------------------------------------------------------------
		function is_float(Element)
		{
			pattern = /^\d+((.|,)\d+)?$/
			return pattern.test(Element.value)
		}


//------------------------------------------------------------------------------------------------------------------------
// Fonction vérifiant si l'élément est numérique et compris dans l'intervalle [min, max]
//	function numeric_range(Element, min, max)
//------------------------------------------------------------------------------------------------------------------------
		function numeric_range(Element, min, max)
		{
			if  ( !Vide(arguments[0]) )
			{
				return ( is_numeric(arguments[0]) && parseInt(arguments[0].value) >= parseInt(arguments[1][0]) && parseInt(arguments[0].value) <= parseInt(arguments[1][1]) );
			}
			return true;
		}


//------------------------------------------------------------------------------------------------------------------------
// Fonction vérifiant si l'élément est une date valide
//------------------------------------------------------------------------------------------------------------------------
		function is_date()
		{
			
			morceaux = arguments[0].value.match(/(\d{1,2})\/(\d{1,2})\/(\d{4})/,"")
			if ( morceaux == null )
			{
				return false
			}
			else
			{
				Jour  = morceaux[1]
				Mois  = morceaux[2] -1
				Annee = morceaux[3]
			}

			DateRef = new Date (Annee,Mois,Jour);

			return ( ( DateRef.getDate() == Jour ) && ( DateRef.getMonth() == Mois ) && ( DateRef.getFullYear() == Annee ) )
		}

//------------------------------------------------------------------------------------------------------------------------
// Fonction vérifiant si l élément est une date valide compris dans l intervalle [min, max]
// 	function (date, min, max)
//------------------------------------------------------------------------------------------------------------------------
		function is_outofdate()
		{
			date = arguments[0].value
			morceaux = date.match(/(\d{1,2})\/(\d{1,2})\/(\d{4})/);

			if ( morceaux == null )
			{
				return false;
			}

			Jour  = morceaux[1];
			Mois  = morceaux[2] -1;
			Annee = morceaux[3];

			DateParam = new Date (Annee,Mois,Jour);
			Today = new Date();
			if ( (Today.getFullYear() - DateParam.getFullYear()) < arguments[1][0] || (Today.getFullYear() - DateParam.getFullYear()) > arguments[1][1] )
			{
				return false;
			}
			return true;
		}


//------------------------------------------------------------------------------------------------------------------------
// Fonction de vérification de la sélection d'un bouton radio
//------------------------------------------------------------------------------------------------------------------------
		function verifRadio(Element)
		{
			if ( get_radio_value(Element) == -1 )
			{
				return false;
			}
			return true;
		}


//------------------------------------------------------------------------------------------------------------------------
// Fonction de vérification d'un champ text suivant les paramètres renseignés
//		si obligatoire		=> vérification que le contenu n'est pas vide 
//		si fctVerif			=> vérification de la validité avec fctVerif 
//		si lgMax			=> vérification de de la longueur maximum 
//------------------------------------------------------------------------------------------------------------------------
		function verifInput (Element, obligatoire, fctVerif, lgMax)
		{
			if ( obligatoire )
			{			
				if ( Vide(Element) )
				{
					return false;
				}
			}

			if ( fctVerif != "" )
			{
				temp = eval(fctVerif);
				if ( !temp(Element)  && !Vide(Element) )
				{
					return false;
				}
			}					

			if ( lgMax != "" )
			{
				if ( Element.value.length > lgMax && !Vide(Element))
				{
					return false;
				}
			}
			return true;
		}


//------------------------------------------------------------------------------------------------------------------------
// Fonction de traitement du clic sur le bouton annuler
//------------------------------------------------------------------------------------------------------------------------
		function annulation()
		{
			if ( confirm('Vous allez perdre toutes vos modifications.\nVoulez-vous continuer ?') )
			{
				document.forms[0].Action.value = "Annuler";
				return true;
			}
			return false;
		}


//------------------------------------------------------------------------------------------------------------------------
// Changement de case input sur la saisie de la date
//------------------------------------------------------------------------------------------------------------------------
	function MAJ_date(formulaire,inputs,inputt)
	{
		inputsource = eval("document."+formulaire+"."+inputs+".value");
		inputtarget = eval("document."+formulaire+"."+inputt);
		if ( (parseInt(inputsource) >= 1) && (inputsource.length >= 2) )
		{
			inputtarget.focus();
		}
	}