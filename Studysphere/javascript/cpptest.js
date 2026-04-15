let allTests = {

1: [

// CO-1 (Basics + Control + Functions + Array + Structure)

{question:"Who developed C++?",options:["Bjarne Stroustrup","Dennis Ritchie","James Gosling","Ken Thompson"],answer:0,explanation:"Bjarne Stroustrup developed C++ in 1979."},

{question:"Which feature supports data hiding?",options:["Encapsulation","Inheritance","Polymorphism","Overloading"],answer:0,explanation:"Encapsulation hides data inside a class."},

{question:"Which is NOT a C++ data type?",options:["int","float","real","char"],answer:2,explanation:"C++ does not have 'real' datatype."},

{question:"Which is a selection control statement?",options:["if","for","while","goto"],answer:0,explanation:"if is used for selection control."},

{question:"Which loop runs at least once?",options:["for","while","do-while","switch"],answer:2,explanation:"do-while executes at least once."},

{question:"Call by reference allows:",options:["Copy value","Modify original","No parameter","Constant value"],answer:1,explanation:"Call by reference modifies original variable."},

{question:"Inline function reduces:",options:["Execution time","Memory size","Loops","Variables"],answer:0,explanation:"Inline reduces function call overhead."},

{question:"2D array example is:",options:["int a;","int a[5];","int a[3][3];","int a();"],answer:2,explanation:"int a[3][3] is 2D array."},

{question:"Structure keyword is:",options:["class","struct","union","object"],answer:1,explanation:"struct defines structure."},

{question:"Union stores:",options:["All members","One member at a time","Multiple objects","Only arrays"],answer:1,explanation:"Union stores one member at a time."}

],

2: [

// CO-2 (Classes & Data Abstraction)

{question:"Class is defined using keyword:",options:["struct","class","object","define"],answer:1,explanation:"class keyword defines a class."},

{question:"Default access in class is:",options:["public","private","protected","friend"],answer:1,explanation:"Default access specifier in class is private."},

{question:"Object is:",options:["Instance of class","Function","Variable","Pointer"],answer:0,explanation:"Object is instance of class."},

{question:"Static member belongs to:",options:["Object","Class","Function","Pointer"],answer:1,explanation:"Static member belongs to class."},

{question:"Friend function can access:",options:["Public only","Private data","Nothing","Only static"],answer:1,explanation:"Friend function accesses private members."},

{question:"const keyword makes data:",options:["Variable","Constant","Private","Static"],answer:1,explanation:"const makes value constant."},

{question:"Nested class means:",options:["Class inside class","Class inside function","Object inside class","None"],answer:0,explanation:"Nested class is class inside class."},

{question:"Container class is:",options:["Holds objects","Holds functions","Holds loops","None"],answer:0,explanation:"Container class stores objects."},

{question:"Structure differs from class because:",options:["No members","Default public","No objects","No functions"],answer:1,explanation:"struct default access is public."},

{question:"Access specifiers are:",options:["if,else","for,while","public,private,protected","int,float"],answer:2,explanation:"These are access specifiers."}

],

3: [

// CO-3 (Pointers + Constructors)

{question:"Pointer stores:",options:["Value","Address","Object","Function"],answer:1,explanation:"Pointer stores address."},

{question:"Dynamic memory is allocated using:",options:["malloc","new","create","alloc"],answer:1,explanation:"new operator allocates memory."},

{question:"Memory is freed using:",options:["delete","free","remove","clear"],answer:0,explanation:"delete frees dynamic memory."},

{question:"Dangling pointer is:",options:["Valid pointer","Uninitialized","Deleted memory pointer","Null"],answer:2,explanation:"Dangling pointer points to deleted memory."},

{question:"Constructor has same name as:",options:["Object","Class","Function","Pointer"],answer:1,explanation:"Constructor name same as class."},

{question:"Destructor is preceded by:",options:["~","#","!","@"],answer:0,explanation:"Destructor uses ~ symbol."},

{question:"Copy constructor copies:",options:["Value","Object","Pointer","Array"],answer:1,explanation:"Copy constructor copies object."},

{question:"Null pointer points to:",options:["0","Garbage","Address","Function"],answer:0,explanation:"Null pointer points to 0."},

{question:"Pointer arithmetic works with:",options:["Address","Value","String","Object"],answer:0,explanation:"Pointer arithmetic works on addresses."},

{question:"Dynamic constructor allocates:",options:["Stack memory","Heap memory","Static memory","None"],answer:1,explanation:"Dynamic constructor uses heap memory."}

],

4: [

// CO-4 (Inheritance)

{question:"Inheritance allows:",options:["Reuse code","Delete class","Hide object","Stop execution"],answer:0,explanation:"Inheritance enables code reuse."},

{question:"Base class is:",options:["Derived","Parent","Child","Object"],answer:1,explanation:"Base class is parent class."},

{question:"Derived class is:",options:["Parent","Child","Pointer","Function"],answer:1,explanation:"Derived class is child class."},

{question:"Multiple inheritance means:",options:["One base","Many base classes","No base","No class"],answer:1,explanation:"Multiple inheritance has many base classes."},

{question:"Function overriding requires:",options:["Same name","Different name","No name","Pointer"],answer:0,explanation:"Overriding requires same function name."},

{question:"Virtual base class avoids:",options:["Duplication","Execution","Objects","Pointers"],answer:0,explanation:"Virtual avoids duplication problem."},

{question:"Constructor executes:",options:["After destructor","Before destructor","Random","None"],answer:1,explanation:"Constructor runs before destructor."},

{question:"Destructor order is:",options:["Derived first","Base first","Random","None"],answer:0,explanation:"Derived destructor executes first."},

{question:"Private members in base are:",options:["Accessible","Not accessible directly","Public","Protected"],answer:1,explanation:"Private base members not directly accessible."},

{question:"Hierarchy means:",options:["Class structure","Function call","Pointer type","Loop"],answer:0,explanation:"Hierarchy means class structure."}

],

5: [

// CO-5 (Operator Overloading + Polymorphism)

{question:"Operator overloading means:",options:["Redefining operator","Deleting operator","Creating loop","Pointer"],answer:0,explanation:"Operator overloading redefines operator."},

{question:"Unary operator uses:",options:["One operand","Two operand","Three","None"],answer:0,explanation:"Unary uses one operand."},

{question:"Binary operator uses:",options:["One operand","Two operand","Three","None"],answer:1,explanation:"Binary uses two operands."},

{question:"Polymorphism means:",options:["Many forms","One form","No form","Class only"],answer:0,explanation:"Polymorphism means many forms."},

{question:"Virtual function enables:",options:["Static binding","Dynamic binding","No binding","Loop"],answer:1,explanation:"Virtual enables dynamic binding."},

{question:"Pure virtual function makes class:",options:["Normal","Abstract","Derived","Base"],answer:1,explanation:"Pure virtual creates abstract class."},

{question:"Dynamic binding happens at:",options:["Compile time","Run time","Edit time","None"],answer:1,explanation:"Dynamic binding occurs at runtime."},

{question:"Virtual destructor is used for:",options:["Safe deletion","Memory leak","Loop","None"],answer:0,explanation:"Virtual destructor ensures safe deletion."},

{question:"Static binding occurs at:",options:["Run time","Compile time","Execution","None"],answer:1,explanation:"Static binding at compile time."},

{question:"Abstract class cannot:",options:["Be instantiated","Have function","Have constructor","Have destructor"],answer:0,explanation:"Abstract class cannot create objects."}

],

6: [

// CO-6 (Templates + File + Exception)

{question:"Template allows:",options:["Generic programming","Loop","Pointer","None"],answer:0,explanation:"Templates support generic programming."},

{question:"Function template is declared using:",options:["template","class","struct","define"],answer:0,explanation:"template keyword declares template."},

{question:"File handling uses header:",options:["fstream","iostream","stdio","string"],answer:0,explanation:"fstream is used for file handling."},

{question:"ifstream is used for:",options:["Input file","Output file","Both","None"],answer:0,explanation:"ifstream reads file."},

{question:"ofstream is used for:",options:["Write file","Read file","Delete file","None"],answer:0,explanation:"ofstream writes file."},

{question:"Exception handling uses:",options:["try-catch","if-else","switch","loop"],answer:0,explanation:"Exception uses try-catch blocks."},

{question:"throw keyword is used to:",options:["Generate exception","Catch error","Delete file","None"],answer:0,explanation:"throw generates exception."},

{question:"Command line arguments are passed to:",options:["main()","class","loop","object"],answer:0,explanation:"Arguments passed to main()."},

{question:"Class template defines:",options:["Generic class","Function","Pointer","Loop"],answer:0,explanation:"Class template defines generic class."},

{question:"Random file access uses:",options:["seekg","open","close","read"],answer:0,explanation:"seekg is used for random access."}

]

};

let currentTest = "";
let scores = {
    1: null,
    2: null,
    3: null,
    4: null,
    5: null,
    6: null
};



function loadTest() {
    currentTest = document.getElementById("testSelect").value;
    let form = document.getElementById("quizForm");

    form.innerHTML = "";
    document.getElementById("result").innerHTML = "";

    if (currentTest === "") return;

    let questions = allTests[currentTest];

    questions.forEach((q, index) => {
        let div = document.createElement("div");
        div.className = "question";

        let html = `<p>${index + 1}. ${q.question}</p>`;

        q.options.forEach((opt, i) => {
            html += `
                <label>
                    <input type="radio" name="q${index}" value="${i}">
                    ${opt}
                </label><br>
            `;
        });

        html += `<div class="explanation" id="exp${index}"></div>`;

        div.innerHTML = html;
        form.appendChild(div);
    });
}

function submitTest() {

    if (currentTest === "") return;

    let questions = allTests[currentTest];
    let score = 0;

    questions.forEach((q, index) => {

        let selected = document.querySelector(`input[name="q${index}"]:checked`);
        let expDiv = document.getElementById(`exp${index}`);

        if (selected) {

            if (parseInt(selected.value) === q.answer) {
                score++;
                expDiv.className = "explanation correct";
                expDiv.innerHTML = "Correct! " + q.explanation;
            } else {
                expDiv.className = "explanation wrong";
                expDiv.innerHTML = "Wrong! " + q.explanation;
            }

            expDiv.style.display = "block";
        }
    });

    scores[currentTest] = score;

    let percentage = (score / 10) * 100;

    document.getElementById("result").innerHTML =
        `Test ${currentTest} Score: ${score}/10 (${percentage}%)`;

    updateProgress();
}

function updateProgress() {

    let report = document.getElementById("progressReport");
    report.innerHTML = "";

    let totalScore = 0;
    let completed = 0;

    for (let i = 1; i <= 6; i++) {
        if (scores[i] !== null) {
            report.innerHTML += `Test ${i}: ${scores[i]}/10 <br>`;
            totalScore += scores[i];
            completed++;
        } else {
            report.innerHTML += `Test ${i}: Not Attempted <br>`;
        }
    }

    if (completed > 0) {
        let overall = (totalScore / (completed * 10)) * 100;
        report.innerHTML += `<br><strong>Overall Progress: ${overall.toFixed(2)}%</strong>`;
    }
}
