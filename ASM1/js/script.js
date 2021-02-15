//เก็บ Data 
var data = [
    {
        homeName: "บ้านเดี่ยว 2 ชั้น",
        homePrice: 4000000
    },
    {
        homeName: "บ้านเดี่ยว ม.โฮมเพลส เดอะพาร์ค วงแหวนพระราม9",
        homePrice: 3750000
    },
    {
        homeName: "คอนโดไอดีโอ ท่าพระ อินเตอร์เชนท์ ติดสถานีรถไฟฟ้า MRT ท่าพระ",
        homePrice: 4690000
    },
    {
        homeName: "บ้านแสนสิริสุขุมวิท 67 แปลงมุม type B หายาก",
        homePrice: 102000000
    },
    {
        homeName: "คฤหาสน์กลางทะเลสาบขนาดพื้นที่ 1 ไร่ 61 ตารางวา โครงการลดาวัลย์ ปิ่นเกล้า ถนนบรมราชชนนี",
        homePrice: 34500000
    } 
]
//ปุ่มเลือกอัตราดอกเบี้ย
$(document).ready(function () {  
    console.log("JSISWORKING") //ทดสอบว่า JS ทำงานยัง??
    var intRate = 0
    $("#intZero").click(function () {
        console.log("Interest",this.value)
        intRate = parseFloat(this.value / 100)
        console.log(intRate)
        $('#interestChoosing').html(`<h4>เลือกอัตราดอกเบี้ย: ${this.value}​​​​​ % </h4>`)
    })
    $("#intFour").click(function() {
        console.log("Interest",this.value)
        intRate = parseFloat(this.value / 100)
        console.log(intRate)
        $('#interestChoosing').html(`<h4>เลือกอัตราดอกเบี้ย: ${this.value}​​​​​ % </h4>`)

    })
    $("#intEight").click(function() {
        console.log("Interest",this.value)
        intRate = parseFloat(this.value / 100)
        console.log(intRate)
        $('#interestChoosing').html(`<h4>เลือกอัตราดอกเบี้ย: ${this.value}​​​​​ % </h4>`)
    })

    $("#submit-period").click(function(){
        let period = document.getElementById('period').value
        console.log(period)
//คำนวน       
        $("#calculation").click(function(){
            let Home = this.value
            let result = data.filter(item => {
                return item.homeName === Home
            })
            console.log(result)
            console.log(period)
            let period_month = period * 12
            console.log(period_month)
            result.forEach(function(item) {
                int_per_year = item.homePrice * intRate
                int_per_month = (int_per_year / 12).toFixed(2)
                totalInt = int_per_year * period
                totalPay = item.homePrice + totalInt
                totalPay_month = (totalPay / period_month).toFixed(2)
                down_payment = item.homePrice * 0.1
                $("#display_down").html(`<h4>เงินดาวน์:&emsp; ${down_payment} บาท</h4>`)
                $("#display_down_month").html(`<h4>เงินผ่อนต่อเดือน:&emsp; ${totalPay_month} บาท</h4>`)
            })
        })
    })
})