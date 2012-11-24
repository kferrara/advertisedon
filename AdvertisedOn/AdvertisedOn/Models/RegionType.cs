namespace AdvertisedOn.Models
{
    public class RegionType
    {
        public int RegionTypeId { get; set; }
        public string Name { get; set; }

        public RegionType()
        {
            
        }

        public RegionType(RegionType regionType)
        {
            this.Name = regionType.Name;
            this.RegionTypeId = regionType.RegionTypeId;
        }
    }
}