import { NgIf, NgFor, UpperCasePipe } from '@angular/common';
import { Component } from '@angular/core';
import { FormControl, FormGroup, ReactiveFormsModule, Validators } from '@angular/forms';
import { RouterLink } from '@angular/router';
import { FieldsService } from '../login/fields.service';
import { formMapper } from '../login/formMapper';

@Component({
  selector: 'app-access',
  imports: [NgIf, NgFor, ReactiveFormsModule, RouterLink, UpperCasePipe],
  templateUrl: './access.component.html',
  styleUrl: '../login/login.component.sass'
})
export class AccessComponent {
  form 
  fields
  constructor(public fieldsService:FieldsService){
    document.title='Accesso'
    // VALIDAZIONE 
    let accessValidation ={
      email: fieldsService.validationFields.email,
      password: fieldsService.validationFields.password,
    }
    this.form =new FormGroup(accessValidation)
    
    // CAMPI (PRENDE SOLO PASSWORD E EMAIL DAL SERVICE)
    this.fields =formMapper(accessValidation, this.fieldsService.validationFields)
    // console.log(this.fields, );
  }

  
  // SUBMIT
  onSubmit(form:FormGroup){
    console.log(form.value)
    form.reset()
  }

}
