using System;
using System.Net;
using System.Net.Http;
using System.Collections.Generic;
using System.Security.Authentication;
using System.Linq;

namespace Autodesk
{
    class Program
    {
        static void TestCall()
        {
            //specify to use TLS 1.2 as default connection
            //System.Net.ServicePointManager.SecurityProtocol = SecurityProtocolType.Tls12;

            var handler = new HttpClientHandler();
            handler.SslProtocols = SslProtocols.Tls12;

            var httpClient = new HttpClient(handler);
            var requestMessage = new HttpRequestMessage();
            
            var uri = new Uri("https://developer.api.autodesk.com/project/v1/hubs?filter[extension.type]=hubs:autodesk.bim360:Account");
            requestMessage.Headers.Host = uri.Authority;
            requestMessage.RequestUri = uri;
            requestMessage.Method = HttpMethod.Get;
            requestMessage.Headers.Add("Authorization", string.Format("Bearer {0}", "YOUR_ACCESS_TOKEN"));

            var task = httpClient.SendAsync(requestMessage, HttpCompletionOption.ResponseHeadersRead);

            var result = task.Result;
            var json = result.Content.ReadAsStringAsync().Result;

            Console.WriteLine(json);
        }

        static void Main(string[] args)
        {
            TestCall();
        }
    }
}
