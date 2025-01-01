import { Component } from '@angular/core';
import { FormGroup, ReactiveFormsModule } from '@angular/forms';
import { FieldsService } from './fields.service';
import { NgFor, NgIf } from '@angular/common';
import { RouterLink } from '@angular/router';
import FormGroupToTemplate from '../../tools/FormGroupToTemplate';

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

    let {controller, templateForm} =FormGroupToTemplate(fieldsService.validationFields, 'search')
    this.form =new FormGroup(controller)
    this.fields =templateForm .filter(field=> field.key!=='termini')
    
    // console.log('>', this.form.value, this.fields )
  }

  // SUBMIT
  onSubmit(form:FormGroup){
    console.log(form.value)
    form.reset()
  }
}