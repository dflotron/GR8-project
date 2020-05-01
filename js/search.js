let database = {
    "00001": {
        title: "Abstract Algebra: Theory and Applications",
        author: "Thomas W. Judson",
        departments: ["MATH", "APPM"]
    },
    "00002": {
        title: "Structure and Interpretation of Computer Programs",
        author: "Gerald Jay Sussman and Hal Abelson",
        departments: ["CSCI", "ATLS"]
    },
    "00003": {
        title: "University Physics",
        author: "Hugh D. Young",
        departments: ["MCEN", "PHYS"]
    },
    "00004": {
        title: "The Cat in The Hat",
        author: "Dr. Seuss",
        departments: ["WRTG", "EDUC"]
    },
    "00005": {
        title: "Biology of Plants",
        author: "Peter H. Raven",
        departments: ["BCHM", "EBIO", "MCDB"]
    },
    "000324": {
        title: "The Odyssey",
        author: "Homer",
        departments: ["CLAS", "ENGL", "GREK"]
    },
    "000325": {
        title: "The Iliad",
        author: "Homer",
        departments: ["CLAS", "ENGL", "GREK"]
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
                <div class="container my-0 px-0">
                    ${getDeptTags()}
                </div>
                <a class="btn btn-secondary mt-2" href="#">Product Page</a>
            </div>
        </div>
    `
}

function filterResults(filter) {
    for (bookId in database) {
        if (database[bookId].title.toLowerCase().includes(filter.toLowerCase()) || filter.toLowerCase().includes(database[bookId].title.toLowerCase())) {
            results[bookId] = database[bookId]
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


$("#search-btn").click(() => {
    clearResults();

    let filter = $("#search-input").val();
    console.log(filter)
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