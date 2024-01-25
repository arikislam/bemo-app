const axios = require('axios');

const baseUrl = process.env.MIX_APP_URL;
const httpClient = axios.create({
    baseURL: baseUrl + '/api',
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
