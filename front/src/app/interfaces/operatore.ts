export interface Operatore {
  id_operatori          :number
  op_nome               :string
  op_cognome            :string
  op_recapito_tel1      :string
  op_recapito_tel2      :string
  op_email              :string
  op_password           :string
  
  op_dettagli           :string
  id_privilegi          :number
  id_struttura          :number
  id_reparto            :number
  codice_ministeriale   :string

  op_ultimo_accesso     :string
  op_connessione        :string
  op_scad_password      :string
  op_inserimento        :string
  op_modifica           :string
  op_data_inserimento   :string
  op_data_modifica      :string
  op_data_scadenza      :string
}
