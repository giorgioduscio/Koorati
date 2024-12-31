import { Component } from '@angular/core';
import { AccettazioniService } from '../../services/accettazioni.service';
import { NgFor, NgIf } from '@angular/common';
import { FormControl, FormGroup, FormsModule, ReactiveFormsModule, Validators } from '@angular/forms';
import { paragraph } from '../../tools/paragraph';
import { Accettazione } from '../../services/accettazione-interface';

@Component({
  selector: 'app-accettazioni',
  imports: [NgIf, NgFor, FormsModule, ReactiveFormsModule],
  templateUrl: './accettazioni.component.html',
  styleUrl: './accettazioni.component.sass'
})
export class AccettazioniComponent {
  // collegamenti ad altre pagine, layout singola accettazione, layout ricetta, api, validazione campi
  isAutorized =true //nascondi form
  filter ='' //filtro
  form
  templateFields :{ key:string, title:string, type:string }[] =[]
  constructor(public accettazioniService:AccettazioniService){
    // VALIDAZIONE DEL FORM
    let fields ={
      id_cliente: new FormControl('', Validators.required),
      id_ricetta_allegata: new FormControl(''),
      data_fruizione: new FormControl('', Validators.required),
      id_flusso_allegato: new FormControl('', Validators.required),
    }
    this.form =new FormGroup(fields)


    // CAMPI DINAMICI DEL FORM
    Object.entries(this.form.value).forEach(item=>{
      let key =item[0] //chiave del campo
      this.templateFields.push({ 
        key:key, 
        title:paragraph(key), 
        type:key==='data_fruizione'? 'text' :'number' 
      })
    })
  }

  onAdd(){
    let values =this.form.value
    console.log('aggiunto', values);
  }
  onDelete(id:number){
    console.log('cancella accettazione con id:', id);
  }
}