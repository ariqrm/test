var mydata = [
    {
        name: "muhammad ari",
        age: 25,
        address: "jl menganti wiyung 1 rt 2 rw 2 no 105 surabaya",
        hobbies: ["bulutsngkid", "sepakbola", "membaca"],
        is_married: false,
        list_school: {
            name: "YPM 1 Taman",
            year_in: 2010,
            year_out: 2013,
            major: "TKJ"
        },
        skills:{
            skill_name: ["php", "Nodejs", "vue", "laravel"],
            level: ["Beginner", "advance", "expert"]
        },
        interest_in_coding: true

    }
];
var myJSON = JSON.stringify(mydata);
console.log(myJSON);
for (var i = 0; i < mydata.length; i++) {
    console.log(mydata[i]);
    console.log(mydata[i].name);
    console.log(mydata[i].skills.level[0]);
    return
}