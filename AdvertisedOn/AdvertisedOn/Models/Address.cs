﻿namespace AdvertisedOn.Models
{
    public class Address
    {
        public int AddressId { get; set; }
        public virtual AddressType Type { get; set; }
        public string Address1 { get; set; }
        public string Address2 { get; set; }
        public string City { get; set; }
        public string State { get; set; }
        public string Zip { get; set; }
    }
}