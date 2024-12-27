import { paragraph } from "../../tools/paragraph"

export function formMapper(form:any, validatorsFields:any) {
  return Object.entries(form).map(item=>{
    let keyField =item[0]
    let asterisk =validatorsFields[keyField].errors===null ?'' :' *'
    return { 
      title:      keyField, 
      placeHold:  paragraph(keyField) +asterisk
    }
  })
}