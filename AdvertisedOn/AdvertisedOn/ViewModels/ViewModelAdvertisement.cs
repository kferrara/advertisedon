using System;
using System.Collections.Generic;
using AdvertisedOn.Models;

namespace AdvertisedOn.ViewModels
{
    public class ViewModelAdvertisement
    {
        public int AdvertisementId { get; set; }
        public int RegionId { get; set; }
        public int RegionTypeId { get; set; }
        public List<RegionType> RegionTypes { get; set; }
        public int BusinessId { get; set; }
        public List<Business> Businesses { get; set; }
        public int HeadingId { get; set; }
        public string HeadingText { get; set; }
        public DateTime EffectiveDate { get; set; }
        public DateTime ExporationDate { get; set; }

        public ViewModelAdvertisement()
        {
            RegionTypes = new List<RegionType>();
            Businesses = new List<Business>();
        }
    }
}