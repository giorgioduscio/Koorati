import { paragraph } from "./paragraph"

/* 
  FUNZIONE CHE TRASFORMA FROMCONTROLL IN ARRAY PER TEMPLATE
  ATTENZIONE SINTASSI: 
    nome_del_campo: new FormControl(':typoInput', [Validators.required, ...]),
*/
export default function FormGroupToTemplate(controlObject:any, inputType ='text'){ 
  // OGGETTO PER LA VALIDAZIONE
  const controller =controlObject
  // ARRAY PER IL TEMPLATE
  const templateForm =Object.keys(controlObject).map(key=>{
    let $key =key as keyof typeof controlObject
    let field =controlObject[$key].value
    // il valore del formControl devve essere una stringa piena
    if (typeof field==='string' && field){
      let splitter =field.split(':')
      inputType =splitter[1]
      // CONTROLLER: COSTRUIRE NUOVO OGGETTO DI FORMCONTROLL
      controller[$key].value =splitter[0]
    }

    // TEMPLATE: ARRAY DI OGGETTI
    return { key, title:paragraph(key), type:inputType }
  })
  
  // console.log( controller, );
  return { controller, templateForm }
}