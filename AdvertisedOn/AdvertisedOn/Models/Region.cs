namespace AdvertisedOn.Models
{
    public class Region
    {
        public int RegionId { get; set; }
        public virtual RegionType Type { get; set; }
        public virtual Advertisement Advertisement { get; set; }
    }
}