const axios = require('axios');

const httpClient = axios.create({
    baseURL: 'http://bemo.test/api',
    timeout: 15000,
    headers: {
        Accept: 'application/json',
    },
});

const responseInterceptor = (response) => {
    switch (response.status) {
        case 200:
            // yay!
            break;
        // any other cases
        default:
        // default case
    }
    return response;
};

httpClient.interceptors.response.use(responseInterceptor);

module.exports = httpClient;
