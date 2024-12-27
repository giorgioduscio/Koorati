import { NgIf, NgFor, UpperCasePipe } from '@angular/common';
import { Component } from '@angular/core';
import { FormControl, FormGroup, ReactiveFormsModule, Validators } from '@angular/forms';
import { RouterLink } from '@angular/router';
import { FieldsService } from '../login/fields.service';

@Component({
  selector: 'app-access',
  imports: [NgIf, NgFor, ReactiveFormsModule, RouterLink, UpperCasePipe],
  templateUrl: './access.component.html',
  styleUrl: '../login/login.component.sass'
})
export class AccessComponent {
  // VALIDAZIONE
  form =new FormGroup({
    email: new FormControl('', [Validators.required, Validators.email]),
    password: new FormControl('', [Validators.required, Validators.minLength(8)]),
  })
  

  // CAMPI
  fields: { title: string; type: string; }[];
  constructor(public fieldsService:FieldsService){
    // PRENDE SOLO PASSWORD E EMAIL DAL SERVICE
    this.fields =fieldsService.fields .filter(field=>
      field.type ==="email" ||
      field.type ==="password" 
    )
    // console.log(this.fields, );
  }

  
  // SUBMIT
  onSubmit(e:FormGroup){
    console.log(e.value)
  }

}
