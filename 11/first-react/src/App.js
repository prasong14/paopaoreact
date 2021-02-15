import React, { useState } from 'react';
import logo from './logo.svg';
import CompanyInfo from './companyInfo'
import './App.css';

function App() {
  const [keyword, setKeyword] = useState("")  // Hook

  var customerData = {
    name: "Diego",
    address: {
      street: "Bang Kapi St.",
      province: "Bangkok",
      zipCode: "12222"
    },
    phone: "085-123-4567"
  }

  var sellerData = {
    name: "Liverpool, Thailand",
    address: {
      street: "Ratchada St.",
      province: "Bangkok",
      zipCode: "11111"
    },
    phone: "02-111-5555"
  }

  var salesData = [
    {name: "Liverpool home jersey", unitPrice: 2750, qty: 50},
    {name: "Liverpool away jersey", unitPrice: 2750, qty: 100},
    {name: "Liverpool thrid jersey", unitPrice: 2750, qty: 75},
    {name: "Liverpool home jersey(2020)", unitPrice: 1200, qty: 20},
    {name: "LVP FC 2021 squad mascot (Full option)", unitPrice: 3990.5, qty: 59}
  ]

  // Build JSX from array
  // Method 1 (basic)
  // var itemList = []
  // salesData.forEach((v, i) => {
  //   itemList.push(
  //     <tr>
  //       <td>{i + 1}</td>
  //       <td>{v.name}</td>
  //       <td>{v.unitPrice}</td>
  //       <td>{v.qty}</td>
  //       <td>{v.unitPrice * v.qty}</td>
  //     </tr>
  //   )
  //   // NO RETURN
  // })

  // Method 2 (best practise)
  // var keyword = "";  // replaced as a state
  var filteredSalesData = salesData.filter(v => v.name.includes(keyword))
  var itemList = filteredSalesData.map((v, i) => {
    return (
      <tr>
        <td>{i + 1}</td>
        <td>{v.name}</td>
        <td>{v.unitPrice}</td>
        <td>{v.qty}</td>
        <td>{v.unitPrice * v.qty}</td>
      </tr>
    )
  })

  var totalAmount = salesData.reduce((pv, v) => pv + v.qty * v.unitPrice, 0)
  var totalQty = salesData.reduce((pv, v) => pv + v.qty, 0)

  const handleOnChange = (e) => {
    console.log(e.target.value)
    // keyword = e.target.value
    setKeyword(e.target.value)
  }

  return (
    <div className="App">
      <h1>Quotation</h1>
      <table width="100%">
        <tr>
          <td>
            <CompanyInfo data={customerData} />
          </td>
          <td>
            <CompanyInfo data={sellerData} />
          </td>
        </tr>
      </table>

{/* Searchbox area */}
Keyword: <input type="text" onChange={handleOnChange} />
      <table className="detailTable">
        <thead>
          <tr>
            <th>#</th>
            <th>Item</th>
            <th>Unit Price</th>
            <th>Qty</th>
            <th>Amount</th>
          </tr>
        </thead>
        <tbody>
          {itemList}
        </tbody>
      </table>
      <h2>Total Amount: {totalAmount.toFixed(2)} Baht</h2>
      <h2>Total Qty: {totalQty} items</h2>
    </div>
  );
}

export default App;
