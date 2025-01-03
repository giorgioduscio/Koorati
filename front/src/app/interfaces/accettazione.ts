export interface Accettazione {
  id__accettazione          :number
  tipologia_accettazione    :string //(indiretta o diretta)
  id_utente                 :number
  id_struttura              :number
  id_reparto                :number
  id_operatore              :number
  descrizione_accettazione  :string
}
