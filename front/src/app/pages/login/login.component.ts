import { Component } from '@angular/core';
import { FormGroup, ReactiveFormsModule } from '@angular/forms';
import { FieldsService } from './fields.service';
import { NgFor, NgIf } from '@angular/common';
import { RouterLink } from '@angular/router';
import { formMapper } from './formMapper';

@Component({
  selector: 'app-login',
  imports: [NgIf, NgFor, ReactiveFormsModule, RouterLink,],
  templateUrl: './login.component.html',
  styleUrl: './login.component.sass'
})
export class LoginComponent {
  form 
  fields
  constructor(public fieldsService:FieldsService){
    document.title='Login'
    // VALIDAZIONE
    this.form =new FormGroup(this.fieldsService.validationFields)
    // CAMPI
    this.fields =formMapper(this.form.value, this.fieldsService.validationFields)
      .filter(field=> field.title!=='termini')

    // console.log(this.fields);
  }


  // SUBMIT
  onSubmit(form:FormGroup){
    console.log(form.value)
    form.reset()
  }
}
