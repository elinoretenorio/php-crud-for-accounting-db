curl -X GET "localhost:8080/coa"

curl -X POST "localhost:8080/coa" -H 'Content-Type: application/json' -d'
{
  "name": "Although lot not. Color visit part case knowledge drive."
}
'

curl -X POST "localhost:8080/coa/581" -H 'Content-Type: application/json' -d'
{
  "id": 581,
  "name": "Although lot not. Color visit part case knowledge drive."
}
'

curl -X GET "localhost:8080/coa/581"

curl -X DELETE "localhost:8080/coa/581"

# --

curl -X GET "localhost:8080/customers"

curl -X POST "localhost:8080/customers" -H 'Content-Type: application/json' -d'
{
  "address": "Work responsibility international. American tonight note give raise civil young two.",
  "contact_person": "Age between church than. Ahead officer teach career little measure election. Space how sea finally standard deep.",
  "email": "rodriguezsteven@example.com",
  "fax": "Entire plan want stock people growth door. State explain pass theory.",
  "name": "Alone law have nor may. Truth suggest or baby science form. Close team meet operation movement.",
  "phone": "Try field dream there site might. Occur call tough hot. Thank three power success should however third. History artist church figure nearly."
}
'

curl -X POST "localhost:8080/customers/5124" -H 'Content-Type: application/json' -d'
{
  "address": "Work responsibility international. American tonight note give raise civil young two.",
  "contact_person": "Age between church than. Ahead officer teach career little measure election. Space how sea finally standard deep.",
  "email": "rodriguezsteven@example.com",
  "fax": "Entire plan want stock people growth door. State explain pass theory.",
  "id": 5124,
  "name": "Alone law have nor may. Truth suggest or baby science form. Close team meet operation movement.",
  "phone": "Try field dream there site might. Occur call tough hot. Thank three power success should however third. History artist church figure nearly."
}
'

curl -X GET "localhost:8080/customers/5124"

curl -X DELETE "localhost:8080/customers/5124"

# --

curl -X GET "localhost:8080/invoice-payments"

curl -X POST "localhost:8080/invoice-payments" -H 'Content-Type: application/json' -d'
{
  "coa_id": 7487,
  "description": "Arrive film very no make threat. Example probably science child represent at PM.",
  "reference": "Pm carry really weight. Any quality prepare final side camera may. Join role get mind outside.",
  "total": 942.0,
  "tran_date": "2021-09-20"
}
'

curl -X POST "localhost:8080/invoice-payments/6965" -H 'Content-Type: application/json' -d'
{
  "coa_id": 7487,
  "description": "Arrive film very no make threat. Example probably science child represent at PM.",
  "id": 6965,
  "reference": "Pm carry really weight. Any quality prepare final side camera may. Join role get mind outside.",
  "total": 942.0,
  "tran_date": "2021-09-20"
}
'

curl -X GET "localhost:8080/invoice-payments/6965"

curl -X DELETE "localhost:8080/invoice-payments/6965"

# --

curl -X GET "localhost:8080/invoices"

curl -X POST "localhost:8080/invoices" -H 'Content-Type: application/json' -d'
{
  "coa_id": 9082,
  "customer_id": 4028,
  "description": "Capital cup table by check more. Bit billion more. Continue central take nothing finish.",
  "due_date": "2021-09-18",
  "invoice_payment_id": 4848,
  "reference": "Step less everybody rate rest. Occur live truth.",
  "status": true,
  "total": 768.34,
  "tran_date": "2021-10-11"
}
'

curl -X POST "localhost:8080/invoices/2820" -H 'Content-Type: application/json' -d'
{
  "coa_id": 9082,
  "customer_id": 4028,
  "description": "Capital cup table by check more. Bit billion more. Continue central take nothing finish.",
  "due_date": "2021-09-18",
  "id": 2820,
  "invoice_payment_id": 4848,
  "reference": "Step less everybody rate rest. Occur live truth.",
  "status": true,
  "total": 768.34,
  "tran_date": "2021-10-11"
}
'

curl -X GET "localhost:8080/invoices/2820"

curl -X DELETE "localhost:8080/invoices/2820"

# --

curl -X GET "localhost:8080/received-moneys"

curl -X POST "localhost:8080/received-moneys" -H 'Content-Type: application/json' -d'
{
  "coa_id": 4845,
  "customer_id": 4762,
  "description": "Finally better feel test. Community late type poor among.",
  "reference": "Use both ago chair I himself marriage create. Accept discover eat drug agency near.",
  "total": 198.0,
  "tran_date": "2021-10-09"
}
'

curl -X POST "localhost:8080/received-moneys/5804" -H 'Content-Type: application/json' -d'
{
  "coa_id": 4845,
  "customer_id": 4762,
  "description": "Finally better feel test. Community late type poor among.",
  "id": 5804,
  "reference": "Use both ago chair I himself marriage create. Accept discover eat drug agency near.",
  "total": 198.0,
  "tran_date": "2021-10-09"
}
'

curl -X GET "localhost:8080/received-moneys/5804"

curl -X DELETE "localhost:8080/received-moneys/5804"

# --

curl -X GET "localhost:8080/invoice-lines"

curl -X POST "localhost:8080/invoice-lines" -H 'Content-Type: application/json' -d'
{
  "invoice_id": 4931,
  "line_amount": 30.52,
  "line_coa_id": 8535
}
'

curl -X POST "localhost:8080/invoice-lines/1876" -H 'Content-Type: application/json' -d'
{
  "id": 1876,
  "invoice_id": 4931,
  "line_amount": 30.52,
  "line_coa_id": 8535
}
'

curl -X GET "localhost:8080/invoice-lines/1876"

curl -X DELETE "localhost:8080/invoice-lines/1876"

# --

curl -X GET "localhost:8080/received-money-lines"

curl -X POST "localhost:8080/received-money-lines" -H 'Content-Type: application/json' -d'
{
  "line_amount": 562.48883261,
  "line_coa_id": 1836,
  "received_money_id": 4775
}
'

curl -X POST "localhost:8080/received-money-lines/9423" -H 'Content-Type: application/json' -d'
{
  "id": 9423,
  "line_amount": 562.48883261,
  "line_coa_id": 1836,
  "received_money_id": 4775
}
'

curl -X GET "localhost:8080/received-money-lines/9423"

curl -X DELETE "localhost:8080/received-money-lines/9423"

# --

curl -X GET "localhost:8080/suppliers"

curl -X POST "localhost:8080/suppliers" -H 'Content-Type: application/json' -d'
{
  "address": "Public stage know could compare next science. Town star ago Mrs become student particular allow. Suffer use better somebody current.",
  "contact_person": "These dinner wife article entire conference both. Ten exist laugh life collection. Able Mr sport.",
  "email": "grahamjustin@example.com",
  "fax": "Instead discover story western business edge. With could she spring.",
  "name": "Fall country food movie. Subject large end wind prepare. Final whole blue single international could paper.",
  "phone": "Five nice radio high spring. Amount that first memory music. Fall specific outside half reduce. Address share raise season crime trip."
}
'

curl -X POST "localhost:8080/suppliers/4953" -H 'Content-Type: application/json' -d'
{
  "address": "Public stage know could compare next science. Town star ago Mrs become student particular allow. Suffer use better somebody current.",
  "contact_person": "These dinner wife article entire conference both. Ten exist laugh life collection. Able Mr sport.",
  "email": "grahamjustin@example.com",
  "fax": "Instead discover story western business edge. With could she spring.",
  "id": 4953,
  "name": "Fall country food movie. Subject large end wind prepare. Final whole blue single international could paper.",
  "phone": "Five nice radio high spring. Amount that first memory music. Fall specific outside half reduce. Address share raise season crime trip."
}
'

curl -X GET "localhost:8080/suppliers/4953"

curl -X DELETE "localhost:8080/suppliers/4953"

# --

curl -X GET "localhost:8080/bill-payments"

curl -X POST "localhost:8080/bill-payments" -H 'Content-Type: application/json' -d'
{
  "coa_id": 4484,
  "description": "Worker pick management pass control right popular. During project even discussion can herself technology. Across candidate interesting place catch local respond nothing.",
  "reference": "Fly economic teacher onto. Admit admit style child.",
  "total": 462.0,
  "tran_date": "2021-10-07"
}
'

curl -X POST "localhost:8080/bill-payments/873" -H 'Content-Type: application/json' -d'
{
  "coa_id": 4484,
  "description": "Worker pick management pass control right popular. During project even discussion can herself technology. Across candidate interesting place catch local respond nothing.",
  "id": 873,
  "reference": "Fly economic teacher onto. Admit admit style child.",
  "total": 462.0,
  "tran_date": "2021-10-07"
}
'

curl -X GET "localhost:8080/bill-payments/873"

curl -X DELETE "localhost:8080/bill-payments/873"

# --

curl -X GET "localhost:8080/bills"

curl -X POST "localhost:8080/bills" -H 'Content-Type: application/json' -d'
{
  "bill_payment_id": 5777,
  "coa_id": 3008,
  "description": "Site risk drug social between cover this. Concern senior explain worry deep.",
  "due_date": "2021-09-16",
  "reference": "Cut certain what understand national represent because.",
  "status": false,
  "supplier_id": 1871,
  "total": 316.0,
  "tran_date": "2021-09-29"
}
'

curl -X POST "localhost:8080/bills/8060" -H 'Content-Type: application/json' -d'
{
  "bill_payment_id": 5777,
  "coa_id": 3008,
  "description": "Site risk drug social between cover this. Concern senior explain worry deep.",
  "due_date": "2021-09-16",
  "id": 8060,
  "reference": "Cut certain what understand national represent because.",
  "status": false,
  "supplier_id": 1871,
  "total": 316.0,
  "tran_date": "2021-09-29"
}
'

curl -X GET "localhost:8080/bills/8060"

curl -X DELETE "localhost:8080/bills/8060"

# --

curl -X GET "localhost:8080/spent-moneys"

curl -X POST "localhost:8080/spent-moneys" -H 'Content-Type: application/json' -d'
{
  "coa_id": 5165,
  "description": "Special thing group total. Raise body evidence write year attorney evidence. Environmental what court. Strategy run opportunity main night say.",
  "reference": "Writer hold according true those so can. Draw describe pull first perform including top.",
  "supplier_id": 1561,
  "total": 160.2,
  "tran_date": "2021-09-17"
}
'

curl -X POST "localhost:8080/spent-moneys/7802" -H 'Content-Type: application/json' -d'
{
  "coa_id": 5165,
  "description": "Special thing group total. Raise body evidence write year attorney evidence. Environmental what court. Strategy run opportunity main night say.",
  "id": 7802,
  "reference": "Writer hold according true those so can. Draw describe pull first perform including top.",
  "supplier_id": 1561,
  "total": 160.2,
  "tran_date": "2021-09-17"
}
'

curl -X GET "localhost:8080/spent-moneys/7802"

curl -X DELETE "localhost:8080/spent-moneys/7802"

# --

curl -X GET "localhost:8080/bill-lines"

curl -X POST "localhost:8080/bill-lines" -H 'Content-Type: application/json' -d'
{
  "bill_id": 6225,
  "line_amount": 295.7,
  "line_coa_id": 7990
}
'

curl -X POST "localhost:8080/bill-lines/9873" -H 'Content-Type: application/json' -d'
{
  "bill_id": 6225,
  "id": 9873,
  "line_amount": 295.7,
  "line_coa_id": 7990
}
'

curl -X GET "localhost:8080/bill-lines/9873"

curl -X DELETE "localhost:8080/bill-lines/9873"

# --

curl -X GET "localhost:8080/spent-money-lines"

curl -X POST "localhost:8080/spent-money-lines" -H 'Content-Type: application/json' -d'
{
  "line_amount": 849.1804,
  "line_coa_id": 8055,
  "spent_money_id": 258
}
'

curl -X POST "localhost:8080/spent-money-lines/2334" -H 'Content-Type: application/json' -d'
{
  "id": 2334,
  "line_amount": 849.1804,
  "line_coa_id": 8055,
  "spent_money_id": 258
}
'

curl -X GET "localhost:8080/spent-money-lines/2334"

curl -X DELETE "localhost:8080/spent-money-lines/2334"

# --

