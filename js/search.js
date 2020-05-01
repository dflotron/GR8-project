//let data;

//MOCK DATA - delete this once we have database call working
let data = {
    "00001": {
        title: "Abstract Algebra: Theory and Applications",
        author: "Thomas W. Judson",
        isbn: "XXX-XX-XXXXX-XX-X"
    },
    "00002": {
        title: "Structure and Interpretation of Computer Programs",
        author: "Gerald Jay Sussman and Hal Abelson",
        isbn: "XXX-XX-XXXXX-XX-X"
    },
    "00003": {
        title: "University Physics",
        author: "Hugh D. Young",
        isbn: "XXX-XX-XXXXX-XX-X"
    },
    "00004": {
        title: "The Cat in The Hat",
        author: "Dr. Seuss",
        isbn: "XXX-XX-XXXXX-XX-X"
    },
    "00005": {
        title: "Biology of Plants",
        author: "Peter H. Raven",
        isbn: "XXX-XX-XXXXX-XX-X"
    },
    "000324": {
        title: "The Odyssey",
        author: "Homer",
        isbn: "XXX-XX-XXXXX-XX-X"
    },
    "000325": {
        title: "The Iliad",
        author: "Homer",
        isbn: "XXX-XX-XXXXX-XX-X"
    }

}

let results = {}

// let searchTerm = "Example Search Term"

function clearResults() {
    $("#search h2").remove();
    $("#search-results").children().remove();
}

function generateResultCard(book) {

    let getDeptTags = () => {
        let tagsHTML = ""
        for (dept in book.departments) {
            let tag = book.departments[dept]
                // console.log(tag)
            tagsHTML += `<span class="badge badge-primary mx-1">${tag}</span>`
        }
        return tagsHTML
    }


    return `
        <div class="card text-dark bg-light my-2">
            <div class="card-body my-0">
                <h4 class="card-title">${book.title}</h4>
                <p class="card-text">${book.author}</p>
                <p class="card-text">ISBN:${book.isbn}</p>
                <a class="btn btn-secondary mt-2" href="#">Product Page</a>
            </div>
        </div>
    `
}

function filterResults(filter) {
    for (bookId in data) {
        if (data[bookId].title.toLowerCase().includes(filter.toLowerCase()) || filter.toLowerCase().includes(data[bookId].title.toLowerCase())) {
            results[bookId] = data[bookId]
        }
    }
}

function displayResults() {
    console.log("displaying search results")
    console.log(results)

    for (bookId in results) {
        let book = results[bookId]
        $("#search-results").append(generateResultCard(book))
    }
}



//This runs when the seart button is clicked
$("#search-btn").click(() => {
    clearResults();

    let filter = $("#search-input").val();
    console.log(filter)

    //LOAD DATA FROM DATABASE
    //
    //let data = 

    if (filter) {
        $("#no-search-terms").addClass("d-none")
        filterResults(filter);
        if (Object.keys(results).length) {
            $("#search-msgs").addClass("d-none")
            displayResults(filter);
        } else {
            $("#search").prepend(`<h2>Search Results for "${filter}":`)
            $("#search-msgs").removeClass("d-none")
            $("#no-results").removeClass("d-none")
        }

    } else {
        $("#search-msgs").removeClass("d-none")
        $("#no-search-terms").removeClass("d-none")
    }
})