import { Injectable } from '@angular/core';

@Injectable({  providedIn: 'root' })
export class FieldsService {
  fields =[
    { title:'nome',     type:'text', },
    { title:'cognome',  type:'text', },
    { title:'email',    type:'email', },
    { title:'password', type:'password', },
    { title:'eta',      type:'number', },
  ]
}
