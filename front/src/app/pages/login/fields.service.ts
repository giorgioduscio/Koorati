import { Injectable } from '@angular/core';
import { FormControl, Validators } from '@angular/forms';

@Injectable({  providedIn: 'root' })
export class FieldsService {
  
  validationFields={
    // GENERALITA
    nome: new FormControl('', Validators.required),
    cognome: new FormControl('', Validators.required),
    data_di_nascita: new FormControl('', Validators.required),
    sesso: new FormControl(':select', Validators.required),
    
    // IDENTIFICAZIONE
    email: new FormControl(':email', [Validators.required, Validators.email]),
    password: new FormControl(':password', [Validators.required, Validators.maxLength(16), Validators.minLength(8)]),
    tipo_di_documento: new FormControl('', Validators.required),
    numero_documento: new FormControl('', Validators.required),
    rilasciato_da: new FormControl('', Validators.required),
    scadenza_del_documento: new FormControl('', Validators.required),
    telefono_cellulare: new FormControl('', Validators.required),

    // INDIRIZZO
    comune_o_stato_di_nascita: new FormControl('', Validators.required),
    cittadinanza: new FormControl('', Validators.required),
    comune_di_residenza: new FormControl('', Validators.required),
    indirizzo_di_residenza: new FormControl('', Validators.required),
    cap_di_residenza: new FormControl('', Validators.required),
    comune_di_domicilio: new FormControl('', Validators.required),
    indirizzo_di_domicilio: new FormControl('', Validators.required),
    cap_di_domicilio: new FormControl('', Validators.required),

    // TERMINI E CONDIZIONI
    termini: new FormControl(false, Validators.requiredTrue),
  }
  
  onInputType(title:string){
    switch(title){
      case 'email': return title
      case 'password': return title
      default: return 'search'
    }
  }

  sendToProfile(){
    /*
    dopo il submit, controlla, crea l'account rimanda alla pagina dell'area privata in base al ruolo
    */ 
  }
}
