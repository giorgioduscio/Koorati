export interface Accettazione {
  id_accettazione             :number,
  tipologia_accettazione      :'indiretta' |'diretta'
  nome                        :string,
  cognome                     :string,
  data_accettazione           :string,
  id_ricetta?                 :number,
  data_fruizione              :string,
  id_flusso_di_registrazione  :number,

  id_utente                   :number,
  id_struttura                :number,
  id_reparto                  :number,
  id_operatore                :number,
  descrizione_accettazione    :string,
}
/*
  id__accettazione(PK)
  tipologia_accettazione (indiretta o diretta)
  id_utente(FK)
  id_struttura(FK)
  id_reparto(FK)
  id_operatore(FK)
  descrizione_accettazione
*/