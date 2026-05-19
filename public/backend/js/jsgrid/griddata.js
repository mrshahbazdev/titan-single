'use strict';
(function() {
    var db = {
        loadData: function(filter) {
            return $.grep(this.clients, function(client) {
                return (!filter.Name || client.Name.indexOf(filter.Name) > -1)
                    && (!filter.Age || client.Age === filter.Age)
                    && (!filter.Address || client.Address.indexOf(filter.Address) > -1)
                    && (!filter.Country || client.Country === filter.Country)
                    && (filter.Married === undefined || client.Married === filter.Married);
            });
        },
        insertItem: function(insertingClient) {
            this.clients.push(insertingClient);
        },
        updateItem: function(updatingClient) { },

        deleteItem: function(deletingClient) {
            var clientIndex = $.inArray(deletingClient, this.clients);
            this.clients.splice(clientIndex, 1);
        }
    };
    window.db = db;
    db.countries = [
        { Name: "India", Id: 0 },
        { Name: "United States", Id: 1 },
        { Name: "Canada", Id: 2 },
        { Name: "United Kingdom", Id: 3 },
        { Name: "France", Id: 4 },
        { Name: "Brazil", Id: 5 },
        { Name: "China", Id: 6 },
        { Name: "Russia", Id: 7 }
    ];
    db.clients = [
        {
            "Task": "Wordpress",
            "Email": "Pixel@efo.com",
            "Phone": "+91 9152639845",
            "Assign": "Otto Clay",
            "Date": "26/09/2022",
            "Price": "$2315.00",
            "Status": "<span class=\"font-warning\">In progress</span>", 
            "Progress": "100%",

            "Id": "1",
            "Product": "Samsung S22 ultra ",
            "Order Id": "#F8ST59L",
            "Quantity": "2",
            "Shipped": "<span class=\"badge badge-light-danger\">Out For Delivery</span>",
            "Total": "$25364",

            "Employee Name": "Virat Kohli",
            "Salary": "$12,000",
            "Skill": "<div class=\"progress-showcase\"><div class=\"progress sm-progress-bar\"><div class=\"progress-bar bg-danger\" role=\"progressbar\" style=\"width: 40%\" aria-valuenow=\"50\" aria-valuemin=\"0\" aria-valuemax=\"100\"></div></div></div>",
            "Office": "India",
            "Hours": "4:30",
            "Experience": "12 Year",
        },
        
    ];
    db.users = [
        
        {
            "Account": "B8DA1912-20A0-FB6E-0031-5F88FD63EF90",
            "Name": "Solomon Green",
            "RegisterDate": "2013-09-04T01:44:47-07:00"
        }
     ];
}());