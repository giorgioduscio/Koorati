import { NgIf, NgFor, UpperCasePipe } from '@angular/common';
import { Component } from '@angular/core';
import { FormGroup, ReactiveFormsModule } from '@angular/forms';
import { RouterLink } from '@angular/router';
import { FieldsService } from '../fields.service';
import FormGroupToTemplate from '../../../tools/FormGroupToTemplate';

@Component({
  selector: 'app-access',
  imports: [NgIf, NgFor, ReactiveFormsModule, RouterLink, UpperCasePipe],
  templateUrl: './access.component.html',
  styleUrl: '../login.component.sass'
})
export class AccessComponent {
  form 
  fields
  constructor(public fieldsService:FieldsService){
    document.title='Accesso'

    let accessValidation ={
      email: fieldsService.validationFields.email,
      password: fieldsService.validationFields.password,
    }
    let {controller, templateForm} =FormGroupToTemplate(accessValidation)
    this.form =new FormGroup(controller)
    this.fields =templateForm
       
    // console.log(this.form, this.fields, );
  }

  
  // SUBMIT
  onSubmit(form:FormGroup){
    console.log(form.value)
    form.reset()
  }

}
